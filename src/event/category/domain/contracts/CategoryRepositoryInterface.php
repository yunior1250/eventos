<?php
namespace  Src\event\category\domain\contracts;
use Src\event\category\domain\entities\Category;

interface CategoryRepositoryInterface
{
    public function create(Category $category): Category;
    public function update(Category $category): Category;
    public function delete(int $id): void;
    public function findById(int $id): ?Category;
    public function getAll(): array;

}
