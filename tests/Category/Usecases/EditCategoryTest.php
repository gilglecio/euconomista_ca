<?php

use Domain\Category\Category;
use Domain\Category\Exceptions\DuplicatedCategoryException;
use Domain\Category\Usecases\SaveCategory\AddNewCategory;
use Domain\Category\Usecases\SaveCategory\SaveCategoryRepository;
use Domain\Category\Usecases\SaveCategory\AddNewCategoryInput;
use Domain\Category\Usecases\SaveCategory\EditCategory;
use Domain\Category\Usecases\SaveCategory\EditCategoryInput;
use Domain\Category\Usecases\SearchCategory\SearchCategoryRepository;

class EditCategoryTest extends \PHPUnit\Framework\TestCase
{
    public function test_edit_category(): void
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

        $usecase = new EditCategory($saveCategory, $searchCategory);

        $input = new EditCategoryInput(1, 'category name');

        $category_id = $usecase->handle($input);

        $this->assertEquals(1, $category_id);
    }

    public function test_edit_duplicated_category(): void
    {
        $saveCategory = new class implements SaveCategoryRepository {
            public function saveCategory(Category $category) : int {
                return 1;
            }
        };

        $searchCategory = new class implements SearchCategoryRepository {
            public function getCategoryByName(string $name) : ?Category {
                return Category::make(id: 2, name: 'category name');
            }
        };

        $usecase = new EditCategory($saveCategory, $searchCategory);

        $input = new EditCategoryInput(1, 'category name');

        $this->expectException(DuplicatedCategoryException::class);
        
        $usecase->handle($input);
    }
}