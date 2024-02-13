<?php

namespace Domain\ValueObjects;

abstract class StringValueObject
{
    protected string $value;

    public function __construct(string $input)
    {
        $this->setValue($input);
    }

    abstract protected function setValue(string $input): void;

    public function value(): string
    {
        return $this->value;
    }
}