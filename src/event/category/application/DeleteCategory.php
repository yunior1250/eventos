<?php

namespace Src\event\category\application;

use Src\event\category\domain\contracts\CategoryRepositoryInterface;

class DeleteCategory
{
    private  CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function execute(int $id): void
    {
        // Lógica para eliminar la categoría
        $this->categoryRepository->delete($id);
    }

}
