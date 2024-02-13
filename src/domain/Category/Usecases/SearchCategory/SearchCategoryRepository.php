<?php

namespace Domain\Category\Usecases\SearchCategory;

use Domain\Category\Category;

interface SearchCategoryRepository
{
    public function getCategoryByName(string $name) : ?Category;
}