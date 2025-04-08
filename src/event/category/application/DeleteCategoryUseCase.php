<?php

namespace Src\event\category\application;

use Src\event\category\domain\contracts\CategoryRepositoryInterface;

class DeleteCategoryUseCase
{
    private  CategoryRepositoryInterface $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function execute(int $id): bool
    {
        // Llamamos al método delete del repositorio para eliminar la categoría.
        return $this->repository->delete($id);
    }

}
