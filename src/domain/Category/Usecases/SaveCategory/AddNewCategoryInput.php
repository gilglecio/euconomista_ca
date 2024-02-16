<?php

namespace Domain\Category\Usecases\SaveCategory;

class AddNewCategoryInput
{
    public function __construct(
        public readonly string $name,
        public readonly ?int $category_id = null
    ) {}
}