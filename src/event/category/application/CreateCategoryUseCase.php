<?php

namespace Src\event\category\application;

use Src\event\category\domain\contracts\CategoryRepositoryInterface;
use Src\event\category\domain\entities\Category;
use Src\event\category\domain\value_objects\CategoryDescription;
use Src\event\category\domain\value_objects\CategoryName;

class CreateCategoryUseCase
{
    private $repository;

    public  function  __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;

    }

    public function execute(Category $category): Category
    {
        // Guardamos la categoría usando el repositorio.
        return $this->repository->create($category);
    }

}
