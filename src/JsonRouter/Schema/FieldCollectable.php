<?php

namespace JsonRouter\Schema;

use JsonRouter\Field;

trait FieldCollectable
{
    /** @var array<Field> */
    private array $fields;

    public function getFields(): array
    {
        return $this->fields;
    }

    public function addField(Field $field): void
    {
        $this->fields[] = $field;
    }
}
