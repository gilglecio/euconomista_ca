<?php

namespace Domain\Category\Usecase\Interface;

use Domain\Category\Category;

interface AddNewCategoryRepository
{
    public function saveCategory(Category $category) : int;
}