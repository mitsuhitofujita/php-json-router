<?php

namespace JsonRouter;

use JsonRouter\Route\MatchSchemaCollectable;
use JsonRouter\Route\UnmatchSchemaCollectable;

class Route
{
    use MatchSchemaCollectable;
    use UnmatchSchemaCollectable;

    public static function assoc(array $data): Route
    {
        return new Route($data);
    }

    public function __construct(private array $data)
    {
    }

    public function match(callable $fn): self
    {
        $schema = new Schema($this->data);
        $fn($schema);
        $this->addMatchSchema($schema);
        return $this;
    }

    public function unmatch(callable $fn): self
    {
        $schema = new Schema($this->data);
        $fn($schema);
        $this->addUnmatchSchema($schema);
        return $this;
    }

    public function handle(callable $fn): self
    {
        if ($this->hasMatchAllSchema() && $this->hasUnmatchAllSchema()) {
            $fn($this->data);
        }
        return $this;
    }
}
