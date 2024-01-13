<?php

namespace JsonRouter;

use JsonRouter\Field\Value;
use JsonRouter\Field\Undefined;
use JsonRouter\Schema\FieldCollectable;

class Schema
{
    use FieldCollectable;

    public static function create(mixed $data): Schema
    {
        return new self($data);
    }

    public function __construct(private mixed $data)
    {
    }

    public function field(mixed $key): Field
    {
        $field = isset($this->data[$key]) ? new Value($this->data[$key]) : new Undefined($this);
        $this->addField($field);
        return $field;
    }

    public function hasMatch(): bool
    {
        foreach ($this->getFields() as $field) {
            if (!$this->hasMatchFieldList($field)) {
                return false;
            }
        }
        return true;
    }

    private function hasMatchFieldList(Field $field): bool
    {
        while ($field !== null) {
            if (!$field->hasMatch()) {
                return false;
            }
            $field = $field->getNextField();
        }
        return true;
    }
}
