<?php

namespace Tests\TestClasses\Actions;

use Pinetcodev\LaravelPowerActions\Action;

class DoesntHaveAccessActionTest extends Action
{
    public function __construct()
    {
        //
    }

    protected function authorize(): bool
    {
        return false;
    }

    protected function handle()
    {
        //
    }
}
