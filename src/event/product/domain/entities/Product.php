<?php

namespace Src\event\product\domain\entities;

use JsonSerializable;
use Src\event\product\domain\value_objects\ProductDescription;
use Src\event\product\domain\value_objects\ProductImage;
use Src\event\product\domain\value_objects\ProductName;
use Src\event\product\domain\value_objects\ProductPrice;
use Src\event\product\domain\value_objects\ProductStock;


class Product implements JsonSerializable
{
    private ?int $id;
    private ProductName $name;
    private ProductDescription $description;
    private ProductPrice $price;
    private ProductStock $stock;
    private int $categoryId;
    private ProductImage $image;

    public function __construct(
        ?int                $id,
        ProductName        $name,
        ProductDescription $description,
        ProductPrice       $price,
        ProductStock       $stock,
        int                $categoryId,
        ProductImage $image
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->categoryId = $categoryId;
        $this->image = $image;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ProductName
    {
        return $this->name;
    }

    public function getDescription(): ProductDescription
    {
        return $this->description;

    }

    public function getPrice(): ProductPrice
    {
        return $this->price;
    }
    public function getStock(): ProductStock
    {
        return $this->stock;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getImage(): ProductImage
    {
        return $this->image;
    }


    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name->getValue(),
            'description' => $this->description->getValue(),
            'price' => $this->price->getValue(),
            'stock' => $this->stock->getValue(),
            'categoryId' => $this->categoryId,
            'image' => $this->image->getValue()
        ];
    }

}
