<?php

namespace Domain\ValueObjects;

class UnsignedInteger extends IntegerValueObject
{
    protected function setValue(int $input): void
    {
        if ($input <= 0) {
            throw new \InvalidArgumentException('the input must be greater than zero');
        }

        $this->value = $input;
    }
}