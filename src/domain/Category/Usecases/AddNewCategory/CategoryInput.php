<?php

namespace Domain\Category\Usecases\AddNewCategory;

class CategoryInput
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name
    ) {}
}