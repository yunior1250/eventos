<?php

namespace Src\event\category\application;

use Src\event\category\domain\contracts\CategoryRepositoryInterface;
use Src\event\category\domain\entities\Category;

class CreateCategory
{
    private CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function execute(Category $category): Category
    {
        // Guardamos la categoría usando el repositorio.
        return $this->categoryRepository->create($category);

    }

}
