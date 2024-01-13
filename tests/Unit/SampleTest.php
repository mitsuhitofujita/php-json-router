<?php

use JsonRouter\Route;

test('perform sample', function () {
    $data = [
        'age' => 100,
        'name' => 'Jone',
        'city' => 'Tokyo',
    ];
    $message = '';
    Route::assoc($data)
        ->match(function ($schema) {
            $schema->field('age')->number()->max(100);
            $schema->field('name')->fixed('Jone');
        })
        ->unmatch(function ($schema) {
            $schema->field('city')->fixed('Nagoya');
        })
        ->handle(function ($data) use (&$message) {
            $message = 'name:' . $data['name'] . ', age:' . $data['age'];
        });
    expect($message)->toBe('name:Jone, age:100');
});
