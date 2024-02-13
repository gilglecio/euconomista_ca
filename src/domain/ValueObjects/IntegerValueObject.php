<?php

namespace Domain\ValueObjects;

abstract class IntegerValueObject
{
    protected int $value;

    public function __construct(int $input)
    {
        $this->setValue($input);
    }

    abstract protected function setValue(int $input): void;

    public function value(): int
    {
        return $this->value;
    }
}