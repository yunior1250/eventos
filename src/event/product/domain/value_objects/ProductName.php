<?php

namespace Src\event\product\domain\value_objects;

class ProductName
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException("Product name cannot be empty");
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

}
