<?php

use Domain\Category\Category;
use Domain\Category\Exceptions\DuplicatedCategoryException;
use Domain\Category\Usecases\SaveCategory\AddNewCategory;
use Domain\Category\Usecases\SaveCategory\SaveCategoryRepository;
use Domain\Category\Usecases\SaveCategory\AddNewCategoryInput;
use Domain\Category\Usecases\SearchCategory\SearchCategoryRepository;

class AddCategoryTest extends \PHPUnit\Framework\TestCase
{
    public function test_add_category(): void
    {
        $saveCategory = new class implements SaveCategoryRepository {
            public function saveCategory(Category $category) : int {
                return 1;
            }
        };

        $searchCategory = new class implements SearchCategoryRepository {
            public function getCategoryByName(string $name) : ?Category {
                return null;
            }
        };

        $usecase = new AddNewCategory($saveCategory, $searchCategory);

        $input = new AddNewCategoryInput('category name');

        $category_id = $usecase->handle($input);

        $this->assertEquals(1, $category_id);
    }

    public function test_add_duplicated_category(): void
    {
        $saveCategory = new class implements SaveCategoryRepository {
            public function saveCategory(Category $category) : int {
                return 1;
            }
        };

        $searchCategory = new class implements SearchCategoryRepository {
            public function getCategoryByName(string $name) : ?Category {
                return Category::make(id: 1, name: 'category name');
            }
        };

        $usecase = new AddNewCategory($saveCategory, $searchCategory);

        $input = new AddNewCategoryInput('category name');

        $this->expectException(DuplicatedCategoryException::class);
        
        $usecase->handle($input);
    }
}