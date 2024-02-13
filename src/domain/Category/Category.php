<?php

namespace Domain\Category;

class Category
{
    private function __construct(
        public readonly ?int $id,
        public readonly string $name
    ) {}

    public static function restore(int $id, string $name): self
    {
        return new self($id, $name);
    }

    public static function make(string $name): self
    {
        return new self(null, $name);
    }
}