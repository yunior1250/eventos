<?php

namespace Src\event\category\infrastructure\repositories;

use Src\event\category\domain\entities\Category;
use Src\event\category\domain\contracts\CategoryRepositoryInterface;

use App\Models\Category as EloquentCategory;
use Src\event\category\domain\value_objects\CategoryDescription;
use Src\event\category\domain\value_objects\CategoryName;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function create(Category $category): Category
    {
        $categoryModel = EloquentCategory::create([
            'name' => $category->getName()->getValue(),
            'description' => $category->getDescription()->getValue(),
        ]);

        return new Category($categoryModel->id, new CategoryName($categoryModel->name), new CategoryDescription($categoryModel->description));
    }

    public function update(Category $category): Category
    {
        $categoryModel = EloquentCategory::findOrFail($category->getId());
        $categoryModel->update([
            'name' => $category->getName()->getValue(),
            'description' => $category->getDescription(),
        ]);

        return new Category($categoryModel->id, new CategoryName($categoryModel->name), $categoryModel->description);
    }

    public function delete(int $id): bool
    {
        return EloquentCategory::destroy($id) > 0;
    }

    public function findById(int $id): ?Category
    {
        $categoryModel = EloquentCategory::find($id);
        return $categoryModel ? new Category($categoryModel->id, new CategoryName($categoryModel->name), $categoryModel->description) : null;
    }

    public function getAll(): array
    {
        $categories = EloquentCategory::all();


        return $categories->map(function ($category) {
            return new Category($category->id, new CategoryName($category->name), new CategoryDescription($category->description));
        })->toArray();
    }

    public function getById(int $id): ?Category
    {
        return $this->findById($id);
    }
}
