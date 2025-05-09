<?php

namespace Domain\ValueObjects;

use DateTimeImmutable;

final class DateImmutable
{
    protected DateTimeImmutable $value;

    public function __construct(string $input)
    {
        $date_immutable = new \DateTimeImmutable($input);
        $date_immutable->setTime(0, 0);

        $this->value = $date_immutable;
    }

    public function value(): string
    {
        return $this->value->format('Y-m-d');
    }
}