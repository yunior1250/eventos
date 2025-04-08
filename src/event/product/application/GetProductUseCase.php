<?php

namespace Src\event\product\application;

use Src\event\product\domain\contracts\ProductRepositoryInterface;

class GetProductUseCase
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(): array
    {
        return $this->productRepository->getAll();
    }


}
