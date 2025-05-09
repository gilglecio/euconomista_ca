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

    public static function make(string $name, ?int $category_id = null, ?int $id = null): self
    {
        return new Category(
            id: $id ? new UnsignedInteger($id) : null,
            category_id: $category_id ? new UnsignedInteger($category_id) : null,
            name: new Name($name),
        );
    }
}