<?php
namespace  Src\event\category\domain\contracts;
use Src\event\category\domain\entities\Category;

interface CategoryRepositoryInterface
{
    public function create(Category $category): Category;
    public function getAll(): array;
    public function getById(int $id): ?Category;
    public function update(Category $category): Category;
    public function delete(int $id): bool;
}
