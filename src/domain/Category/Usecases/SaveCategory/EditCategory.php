<?php

namespace Domain\Category\Usecases\SaveCategory;

use Domain\Category\Category;

use Domain\Category\Exceptions\DuplicatedCategoryException;
use Domain\Category\Usecases\SearchCategory\SearchCategoryRepository;

class EditCategory
{
    public function __construct(
        private SaveCategoryRepository $saveCategory,
        private SearchCategoryRepository $searchCategory
    ) {
        $this->saveCategory = $saveCategory;
        $this->searchCategory = $searchCategory;
    }

    public function handle(EditCategoryInput $input): int
    {
        $category_by_name = $this->searchCategory->getCategoryByName($input->name);

        if ($category_by_name && $category_by_name->id->value() != $input->id) {
            throw new DuplicatedCategoryException('Já existe uma categoria com este nome');
        }

        $category = Category::make($input->name, $input->category_id);

        $category_id = $this->saveCategory->saveCategory($category);

        return $category_id;
    }
}