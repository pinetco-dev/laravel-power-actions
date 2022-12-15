<?php

namespace Pinetcodev\LaravelPowerActions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Pinetcodev\LaravelPowerActions\Commands\ActionMakeCommand;

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
