<?php

namespace JsonRouter\Field;

use JsonRouter\Field;

trait Listable
{
    public ?Field $nextField = null;

    public function setNextField(Field $field): void
    {
        $this->nextField = $field;
    }
    
    public function getNextField(): ?Field
    {
        return $this->nextField;
    }

    public function isEndField(): bool
    {
        return $this->nextField === null;
    }
}
