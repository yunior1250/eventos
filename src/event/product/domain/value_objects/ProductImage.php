<?php

namespace Src\event\product\domain\value_objects;

use function PHPUnit\Framework\fileExists;

class ProductImage
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException("Product image cannot be empty");
        }
        if(!filter_var($value, FILTER_VALIDATE_URL)&& !fileExists(storage_path('app/public/' . $value))){
            throw new \InvalidArgumentException("Invalid image path");
        }
        $this->value = $value;
    }
    public function getValue(): string
    {
        return $this->value;
    }

}
