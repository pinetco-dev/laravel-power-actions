<?php

namespace Tests\TestClasses\Actions;

use Pinetcodev\LaravelPowerActions\Action;

class NonCanPerformedActionTest extends Action
{
    public function __construct()
    {
        //
    }

    protected function shouldExecute(): bool
    {
        return false;
    }

    protected function handle()
    {
        //
    }
}
