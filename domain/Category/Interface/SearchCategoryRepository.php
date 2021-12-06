<?php

namespace Domain\Category\Usecase\Interface;

use Domain\Category\Category;

interface SearchCategoryRepository
{
    public function getCategoryByName(string $name) : ?Category;
}