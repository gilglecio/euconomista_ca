<?php

use Domain\Category\Category;
use Domain\Category\Exceptions\DuplicatedCategoryException;
use Domain\Category\Usecases\AddNewCategory\AddNewCategory;
use Domain\Category\Usecases\AddNewCategory\AddNewCategoryRepository;
use Domain\Category\Usecases\AddNewCategory\AddNewCategoryInput;
use Domain\Category\Usecases\SearchCategory\SearchCategoryRepository;

class AddCategoryTest extends \PHPUnit\Framework\TestCase
{
    public function test_add_category(): void
    {
        $saveCategory = new class implements AddNewCategoryRepository {
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

        $data = new AddNewCategoryInput('category name');

        $category_id = $usecase->handle($data);

        $this->assertEquals(1, $category_id);
    }

    public function test_add_duplicated_category(): void
    {
        $saveCategory = new class implements AddNewCategoryRepository {
            public function saveCategory(Category $category) : int {
                return 1;
            }
        };

        $searchCategory = new class implements SearchCategoryRepository {
            public function getCategoryByName(string $name) : ?Category {
                return Category::restore(1, 'category name');
            }
        };

        $usecase = new AddNewCategory($saveCategory, $searchCategory);

        $data = new AddNewCategoryInput('category name');

        $this->expectException(DuplicatedCategoryException::class);
        
        $usecase->handle($data);
    }
}