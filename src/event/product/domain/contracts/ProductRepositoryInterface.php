<?php

namespace Src\event\product\domain\contracts;

use Src\event\product\domain\entities\Product;

interface  ProductRepositoryInterface
{
    public function create(Product $product): Product;

    public function getAll(): array;

    public function getById(int $id): ?Product;

    public function update(Product $product): Product;

    public function delete(int $id): bool;

}
