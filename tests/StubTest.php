<?php

it('has action stub', function () {
    expect(file_exists(__DIR__.'/../stubs/action.stub'))->toBeTrue();
});

it('has action plain stub', function () {
    expect(file_exists(__DIR__.'/../stubs/action.plain.stub'))->toBeTrue();
});
