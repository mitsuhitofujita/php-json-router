<?php

require_once __DIR__ . "/../vendor/autoload.php";

use JsonRouter\Route;

class Sample
{
    public static function main()
    {
        $data = [
            'age' => 100,
            'name' => 'Jone',
            'city' => 'Tokyo',
        ];
        Route::assoc($data)
            ->match(function ($schema) {
                $schema->field('age')->number()->max(100);
                $schema->field('name')->fixed('Jone');
            })
            ->unmatch(function ($schema) {
                $schema->field('city')->fixed('Nagoya');
            })
            ->handle(function ($data) {
                echo 'name:' . $data['name'] . PHP_EOL;
                echo 'age:' . $data['age'] . PHP_EOL;
            });
    }
}

(new Sample())->main();
