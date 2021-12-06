<?php

use Domain\Category\Category;
use Domain\Category\Error\DuplicatedCategoryException;
use Domain\Category\Usecase\AddNewCategory;
use Domain\Category\Usecase\CategoryInput;
use Domain\Category\Usecase\Interface\AddNewCategoryRepository;
use Domain\Category\Usecase\Interface\SearchCategoryRepository;

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

        $data = new CategoryInput();
        $data->setName('category name');

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
                return new Category('category name');
            }
        };

        $usecase = new AddNewCategory($saveCategory, $searchCategory);

        $data = new CategoryInput();
        $data->setName('category name');

        $this->expectException(DuplicatedCategoryException::class);
        
        $usecase->handle($data);
    }
}