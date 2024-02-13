<?php

namespace Domain\Category\Usecases\AddNewCategory;

class AddNewCategoryInput
{
    public function __construct(
        public readonly string $name
    ) {}
}