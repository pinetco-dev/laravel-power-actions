<?php

namespace Tests\TestClasses\Actions;

use Pinetcodev\LaravelPowerActions\Action;
use Pinetcodev\LaravelPowerActions\Tests\TestClasses\Jobs\AfterAsyncTestJob;

class CanPerformedActionTest extends Action
{
    public function __construct()
    {
        //
    }

    protected function authorize(): bool
    {
        return true;
    }

    protected function shouldExecute(): bool
    {
        return true;
    }

    protected function before()
    {
        // pre processing goes here...
    }

    protected function handle()
    {
    }

    protected function after()
    {
        // post processing goes here...
    }

    public function afterAsync()
    {
        AfterAsyncTestJob::dispatch();
    }
}
