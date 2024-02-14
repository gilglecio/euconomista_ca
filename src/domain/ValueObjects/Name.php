<?php

namespace Domain\ValueObjects;

use InvalidArgumentException;

final class Name extends StringValueObject
{
    protected function setValue(string $input): void
    {
        $input = preg_replace('/[^A-Za-z0-9\s]/', '', $input);
        $input = trim($input ?? '');
        $input = preg_replace('/\s+/', ' ', $input);
        if (is_null($input) || strlen($input) == 0) {
            throw new InvalidArgumentException('input is invalid');
        }
        $this->value = $input;
    }
}