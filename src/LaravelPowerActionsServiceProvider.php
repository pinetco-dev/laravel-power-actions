<?php

namespace Pinetcodev\LaravelPowerActions;

use App\Console\Commands\ActionMakeCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPowerActionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         */
        $package
            ->name('laravel-power-actions')
            ->hasCommand(ActionMakeCommand::class);
    }
}
