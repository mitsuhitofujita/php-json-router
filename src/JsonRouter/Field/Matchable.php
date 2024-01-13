<?php

namespace JsonRouter\Field;

use JsonRouter\Field;

trait Matchable
{
    public function fixed(mixed $fixed): Field
    {
        return $this;
    }

    public function number(): Field
    {
        return $this;
    }

    public function max(mixed $max): Field
    {
        return $this;
    }

    public function hasMatch(): bool
    {
        return false;
    }
}
