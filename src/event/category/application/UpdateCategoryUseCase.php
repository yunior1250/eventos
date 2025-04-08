<?php

namespace Src\event\category\application;

use Src\event\category\domain\contracts\CategoryRepositoryInterface;
use Src\event\category\domain\entities\Category;

class UpdateCategoryUseCase
{
    private CategoryRepositoryInterface $repository;
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function execute(Category $category): Category
    {
        return $this->repository->update($category);
    }
}
