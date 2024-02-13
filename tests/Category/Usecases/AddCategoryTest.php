<?php

use Domain\Category\Category;
use Domain\Category\Error\DuplicatedCategoryException;
use Domain\Category\Usecases\AddNewCategory\AddNewCategory;
use Domain\Category\Usecases\AddNewCategory\AddNewCategoryRepository;
use Domain\Category\Usecases\AddNewCategory\CategoryInput;
use Domain\Category\Usecases\SearchCategory\SearchCategoryRepository;

class AddCategoryTest extends \PHPUnit\Framework\TestCase
{
    public function test_add_category()
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

        $data = new CategoryInput(null, 'category name');

        $category_id = $usecase->handle($data);

        $this->assertEquals(1, $category_id);
    }

    public function test_add_duplicated_category()
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

        $data = new CategoryInput(1, 'category name');

        $this->expectException(DuplicatedCategoryException::class);
        
        $usecase->handle($data);
    }
}