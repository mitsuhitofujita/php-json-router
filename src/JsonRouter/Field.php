<?php

namespace JsonRouter;

interface Field
{
    public function fixed(mixed $fixed);
    public function number();
    public function max(mixed $max);
    public function getNextField(): ?Field;
    public function hasMatch(): bool;
}
