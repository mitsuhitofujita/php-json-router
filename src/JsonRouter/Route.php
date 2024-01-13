<?php

namespace JsonRouter;

class Route
{
    public static function assoc(array $data): Route
    {
        return new Route($data);
    }

    public function __construct(private array $data)
    {
    }

    public function match(callable $schemaFunction, callable $callFunction)
    {
        $schema = new Schema($this->data);
        $schemaFunction($schema);
        if ($schema->hasMatch()) {
            $callFunction($this->data);
        }
        return $this;
    }
}
