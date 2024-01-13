<?php

namespace JsonRouter;

use JsonRouter\Field\Listable;
use JsonRouter\Field\Value;
use JsonRouter\Field\Undefined;

class Schema
{
    public static function create(mixed $data): Schema
    {
        return new self($data);
    }

    /** @var array<Field> */
    private array $fields;

    public function __construct(private mixed $data)
    {
    }

    public function field(mixed $key): Field
    {
        $field = isset($this->data[$key]) ? new Value($this->data[$key]) : new Undefined($this);
        $this->addField($field);
        return $field;
    }

    public function addField(Field $field): void
    {
        $this->fields[] = $field;
    }

    public function hasMatch()
    {
        foreach ($this->fields as $field) {
            while ($field !== null) {
                if (!$field->hasMatch()) {
                    return false;
                }
                $field = $field->getNextField();
            }
        }
        return true;
    }
}
