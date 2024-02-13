<?php

namespace Domain\ValueObjects;

final class Name extends StringValueObject
{
    protected function setValue(string $input): void
    {
        $this->value = trim($input);
    }
}