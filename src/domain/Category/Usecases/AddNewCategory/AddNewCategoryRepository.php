<?php

namespace Domain\Category\Usecases\AddNewCategory;

use Domain\Category\Category;

interface AddNewCategoryRepository
{
    public function saveCategory(Category $category) : int;
}