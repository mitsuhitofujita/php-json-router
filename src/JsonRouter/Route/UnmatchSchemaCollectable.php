<?php

namespace JsonRouter\Route;

use JsonRouter\Schema;

trait UnmatchSchemaCollectable
{
    private array $unmatchSchemas = [];

    public function addUnmatchSchema(Schema $schema): void
    {
        $this->unmatchSchemas[] = $schema;
    }

    public function hasUnmatchAllSchema(): bool
    {
        foreach ($this->unmatchSchemas as $schema) {
            if ($schema->hasMatch()) {
                return false;
            }
        }
        return true;
    }
}
