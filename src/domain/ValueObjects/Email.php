<?php

namespace Domain\ValueObjects;

class Email extends StringValueObject
{
    protected function setValue(string $input): void
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email address');
        }

        $this->value = $input;
    }
}