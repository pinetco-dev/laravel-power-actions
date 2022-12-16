<?php

namespace Tests\TestClasses\Actions;

use Pinetcodev\LaravelPowerActions\Action;

class AuthorizedActionTest extends Action
{
    public function __construct()
    {
        //
    }

    protected function authorize(): bool
    {
        return true;
    }

    protected function handle()
    {
        //
    }
}
