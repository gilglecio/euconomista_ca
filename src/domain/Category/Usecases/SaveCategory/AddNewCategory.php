<?php

namespace Domain\Category\Usecases\SaveCategory;

use Domain\Category\Category;

use Domain\Category\Exceptions\DuplicatedCategoryException;
use Domain\Category\Usecases\SearchCategory\SearchCategoryRepository;

class AddNewCategory
{
    public function __construct(
        private SaveCategoryRepository $saveCategory,
        private SearchCategoryRepository $searchCategory
    ) {}

    public function handle(AddNewCategoryInput $input): int
    {
        if ($this->searchCategory->getCategoryByName($input->name)) {
            throw new DuplicatedCategoryException('Já existe uma categoria com este nome');
        }

        $category = Category::make($input->name, $input->category_id);

        $category_id = $this->saveCategory->saveCategory($category);

        return $category_id;
    }
}