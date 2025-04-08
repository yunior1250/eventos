<?php

namespace Src\event\product\application;

use Src\event\product\domain\contracts\ProductRepositoryInterface;
use Src\event\product\domain\entities\Product;

class UpdateProductUseCase
{
    private ProductRepositoryInterface  $productRepository;

    public  function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function execute(Product $product): Product
    {
        return $this->productRepository->update($product);

    }
}
