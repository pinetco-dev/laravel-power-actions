<?php

namespace Pinetcodev\LaravelPowerActions;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\AuthorizationException;
use Pinetcodev\LaravelPowerActions\Jobs\ExecuteAfterActionJob;

abstract class Action implements ActionContract
{
    protected bool $withDBTransaction = true;

    protected bool $logException = true;

    private bool $performed = false;

    public static function make(...$arguments)
    {
        return new static(...$arguments);
    }

    protected function authorize(): bool
    {
        return true;
    }

    protected function shouldExecute(): bool
    {
        return true;
    }

    abstract protected function handle();

    public function execute(): ActionContract
    {
        if (!$this->authorize()) {
            throw new AuthorizationException;
        }

        if ($this->shouldExecute()) {
            if ($this->withDBTransaction) {
                DB::beginTransaction();
            }

            try {
                $this->before();

                $this->handle();

                if ($this->withDBTransaction) {
                    DB::commit();
                }

                $this->executed();
            } catch (Exception $exception) {
                if ($this->withDBTransaction) {
                    DB::rollBack();
                }

                $this->catchException($exception);

                throw $exception;
            }
        }

        return $this;
    }

    protected function executed()
    {
        $this->after();

        ExecuteAfterActionJob::dispatch($this);

        $this->performed = true;
    }

    public function performed(): bool
    {
        return $this->performed;
    }

    protected function before()
    {
        // pre processing goes here...
    }

    protected function after()
    {
        // post processing goes here...
    }

    public function afterAsync()
    {
        // async post processing goes here...
    }

    protected function catchException(Exception $exception)
    {
        if (!$this->logException) {
            return;
        }

        $location = Str::after($exception->getFile(), base_path()) . ':' . $exception->getLine();

        $message = class_basename($this) . " action has failed because of {$exception->getMessage()} at \"$location\"";

        logger()->error($message);
    }
}
