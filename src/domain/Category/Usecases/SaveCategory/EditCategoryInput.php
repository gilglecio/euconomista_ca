<?php

namespace Domain\Category\Usecases\SaveCategory;

class EditCategoryInput
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?int $category_id = null
    ) {}
}