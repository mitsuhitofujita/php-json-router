<?php

namespace JsonRouter\Field;

use JsonRouter\Field;

class Value implements Field
{
    use Listable;

    public function __construct(private mixed $value)
    {
    }

    public function fixed(mixed $fixed): Field
    {
        if ($this->value !== $fixed) {
            return $this->createUnmatched();
        }
        return $this;
    }

    public function number(): Field
    {
        if (!is_numeric($this->value)) {
            return $this->createUnmatched();
        }
        return $this;
    }

    public function max(mixed $max): Field
    {
        if ($this->value > $max) {
            return $this->createUnmatched();
        }
        return $this;
    }

    private function createUnmatched(): Unmatched
    {
        $unmatched = new Unmatched();
        $this->setNextField($unmatched);
        return $unmatched;
    }

    public function hasMatch(): bool
    {
        return true;
    }
}
