<?php

namespace Domain\Category;

use Domain\ValueObjects\Name;
use Domain\ValueObjects\UnsignedInteger;

class Category
{
    private function __construct(
        public readonly ?UnsignedInteger $id,
        public readonly ?UnsignedInteger $category_id,
        public readonly Name $name
    ) {}

    public static function restore(int $id, string $name, int $category_id = null): self
    {
        return new self(new UnsignedInteger($id), $category_id ? new UnsignedInteger($category_id) : null, new Name($name));
    }

    public static function make(string $name, int $category_id = null): self
    {
        return new self(null, $category_id ? new UnsignedInteger($category_id) : null, new Name($name));
    }
}