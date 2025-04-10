<?php

namespace Src\event\product\application;

use Src\event\product\domain\contracts\ProductRepositoryInterface;

class DeleteProductUseCase
{
    private  ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function execute(int $id): bool
    {
        // Llamamos al método delete del repositorio para eliminar el producto.
        return $this->productRepository->delete($id);
    }

}
