<?php

namespace JsonRouter\Route;

use JsonRouter\Schema;

trait MatchSchemaCollectable
{
    private array $matchSchemas = [];

    public function addMatchSchema(Schema $schema): void
    {
        $this->matchSchemas[] = $schema;
    }

    public function hasMatchAllSchema(): bool
    {
        foreach ($this->matchSchemas as $schema) {
            if (!$schema->hasMatch()) {
                return false;
            }
        }
        return true;
    }
}
