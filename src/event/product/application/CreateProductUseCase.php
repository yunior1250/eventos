<?php

namespace Src\event\product\application;
use Src\event\product\domain\contracts\ProductRepositoryInterface;
use Src\event\product\domain\entities\Product;
use Src\event\product\domain\value_objects\ProductDescription;
use Src\event\product\domain\value_objects\ProductName;
use Src\event\product\domain\value_objects\ProductPrice;
use Src\event\product\domain\value_objects\ProductStock;
use Src\event\product\domain\value_objects\ProductImage;


class CreateProductUseCase
{
    private $repository;

    public  function  __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;

    }

    public function execute($data): Product
    {
        // Creamos los Value Objects
        $productName = new ProductName($data['name']);
        $productDescription = new ProductDescription($data['description']);
        $productPrice = new ProductPrice($data['price']);
        $productStock = new ProductStock($data['stock'] ?? 0);  // Usamos 0 si no se pasó stock
        $productImage = new ProductImage($data['image']); // Ruta de la imagen

        // Creamos el producto
        $product = new Product(
            null,  // No tenemos el ID todavía
            $productName,
            $productDescription,
            $productPrice,
            $productStock,
            $data['category_id'],
            $productImage
        );

        // Guardamos el producto usando el repositorio
        return $this->repository->create($product);

    }

}
