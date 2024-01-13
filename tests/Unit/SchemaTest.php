<?php

use JsonRouter\Route;

test('undefined field', function () {
    $data = [
        'age' => 100,
    ];
    $route = Route::assoc($data)
        ->match(function ($schema) {
            $schema->field('name');
        });
    expect($route->hasMatchAllSchema())->toBe(false);
});

test('unmatched number', function () {
    $data = [
        'age' => 'one',
    ];
    $route = Route::assoc($data)
        ->match(function ($schema) {
            $schema->field('age')->number();
        });
    expect($route->hasMatchAllSchema())->toBe(false);
});

test('max 100', function (int $age, bool $expect) {
    $data = [
        'age' => $age,
    ];
    $route = Route::assoc($data)
        ->match(function ($schema) {
            $schema->field('age')->max(100);
        });
    expect($route->hasMatchAllSchema())->toBe($expect);
})->with([
    [101, false],
    [100, true],
]);
