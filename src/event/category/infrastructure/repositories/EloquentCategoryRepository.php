<?php

namespace Src\event\category\infrastructure\repositories;

use Src\event\category\domain\entities\Category;
use Src\event\category\domain\contracts\CategoryRepositoryInterface;

use App\Models\Category as EloquentCategory;
use Src\event\category\domain\value_objects\CategoryName;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function create(Category $category): Category
    {
        $categoryModel = EloquentCategory::create([
            'name' => $category->getName()->getValue(),
            'description' => $category->getDescription(),
        ]);

        return new Category($categoryModel->id, new CategoryName($categoryModel->name), $categoryModel->description);
    }

    public function update(Category $category): Category
    {
        $categoryModel = EloquentCategory::findOrFail($category->getId());
        $categoryModel->update([
            'name' => $category->getName()->getValue(),
            'description' => $category->getDescription(),
        ]);

        return new Category($categoryModel->id, new \Src\BoundedContext\Category\Domain\ValueObjects\CategoryName($categoryModel->name), $categoryModel->description);
    }

    public function delete(int $id): void
    {
        EloquentCategory::destroy($id);
    }

    public function findById(int $id): ?Category
    {
        $categoryModel = EloquentCategory::find($id);
        return $categoryModel ? new Category($categoryModel->id, new \Src\BoundedContext\Category\Domain\ValueObjects\CategoryName($categoryModel->name), $categoryModel->description) : null;
    }

    public function getAll(): array
    {
        $categories = EloquentCategory::all(); // Obtiene todas las categorías
        return $categories->map(function ($category) {
            return new Category($category->id, new CategoryName ($category->name), $category->description);
        })->toArray();
    }
}
