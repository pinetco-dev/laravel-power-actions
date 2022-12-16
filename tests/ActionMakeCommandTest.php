<?php

use Illuminate\Console\Command;
use function Pest\Laravel\artisan;
use Pinetcodev\LaravelPowerActions\Commands\ActionMakeCommand;

it('can run action command', function () {
    artisan(ActionMakeCommand::class, ['name' => 'User'])
        ->assertExitCode(Command::SUCCESS);
});
