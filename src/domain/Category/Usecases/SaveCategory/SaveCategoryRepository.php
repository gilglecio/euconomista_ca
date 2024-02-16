<?php

namespace Domain\Category\Usecases\SaveCategory;

use Domain\Category\Category;

interface SaveCategoryRepository
{
    public function saveCategory(Category $category) : int;
}