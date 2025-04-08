<?php

namespace Src\event\product\domain\value_objects;

class ProductPrice
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value <= 0) {
            throw new \InvalidArgumentException("Product price must be greater than zero");
        }
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }

}
