<?php

namespace Pinetcodev\LaravelPowerActions;

interface ActionContract
{
    /**
     * Executes the action.
     *
     * @return mixed
     */
    public function execute();

    /**
     * Indicates if action has been performed or not.
     *
     * @return bool
     */
    public function performed(): bool;

    /**
     * Asynchronous post-processing for action (executes using queue job).
     *
     * @return void
     */
    public function afterAsync();
}
