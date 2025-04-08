<?php

namespace Src\event\product\domain\value_objects;
/**
 * Class ProductStock
 * @package Src\event\product\domain\value_objects
 *
 * This class represents the stock of a product.
 * It ensures that the stock value is always a non-negative integer.
 */

class ProductStock
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException("Product stock cannot be negative");
        }
        $this->value = $value;
    }
    public function getValue(): int
    {
        return $this->value;
    }
}
