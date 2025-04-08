<?php

namespace Src\event\product\domain\value_objects;

class ProductDescription
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException("Product description cannot be empty");
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

}
