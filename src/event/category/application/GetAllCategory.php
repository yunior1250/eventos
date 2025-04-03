<?php
namespace  Src\event\category\application;
use Src\event\category\domain\contracts\CategoryRepositoryInterface;

class GetAllCategory
{
    private CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function execute(): array
    {
        return $this->categoryRepository->getAll();
    }
}
