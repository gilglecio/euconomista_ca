<?php

namespace Domain\Category;

use Domain\ValueObjects\Name;
use Domain\ValueObjects\UnsignedInteger;

class Category
{
    private function __construct(
        public readonly ?UnsignedInteger $id,
        public readonly Name $name
    ) {}

    public static function restore(int $id, string $name): self
    {
        return new self(new UnsignedInteger($id), new Name($name));
    }

    public static function make(string $name): self
    {
        return new self(null, new Name($name));
    }
}