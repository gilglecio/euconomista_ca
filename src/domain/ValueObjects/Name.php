<?php

namespace Domain\ValueObjects;

final class Name extends StringValueObject
{
    protected function setValue(string $input): void
    {
        $input = trim(preg_replace('/[^A-Za-z0-9\s]/', '', $input));
        $this->value = preg_replace('/\s+/', ' ', $input);
    }
}