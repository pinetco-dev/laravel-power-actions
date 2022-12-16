<?php

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Bus;
use Pinetcodev\LaravelPowerActions\Jobs\ExecuteAfterActionJob;
use Pinetcodev\LaravelPowerActions\Tests\TestClasses\Jobs\AfterAsyncTestJob;
use Tests\TestClasses\Actions\AuthorizedActionTest;
use Tests\TestClasses\Actions\CanPerformedActionTest;
use Tests\TestClasses\Actions\DoesntHaveAccessActionTest;
use Tests\TestClasses\Actions\NonCanPerformedActionTest;

it('can perform if it is executable', function () {
    $action = CanPerformedActionTest::make()->execute();
    expect($action->performed())->toBeTrue();
});

it('can\'t perform if it isn\'t executable', function () {
    $action = NonCanPerformedActionTest::make()->execute();
    expect($action->performed())->toBeFalse();
});

it('can perform if it has access', function () {
    $action = AuthorizedActionTest::make()->execute();
    expect($action->performed())->toBeTrue();
});

it('can\'t perform if it doesn\'t have access', function () {
    $this->expectException(AuthorizationException::class);
    $action = DoesntHaveAccessActionTest::make()->execute();
    expect($action->performed())->toBeFalse();
});

it('can dispatched ExecuteAfterActionJob job', function () {
    Bus::fake();

    $action = CanPerformedActionTest::make()->execute();
    expect($action->performed())->toBeTrue();

    Bus::assertDispatched(ExecuteAfterActionJob::class);
});

it('can run async method if it is exist on action class', function () {
    Bus::fake();
    $action = CanPerformedActionTest::make()->execute();

    Bus::assertDispatched(AfterAsyncTestJob::class);
});
