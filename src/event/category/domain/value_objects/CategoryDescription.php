<?php

namespace Src\event\category\domain\value_objects;

class CategoryDescription
{

    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException("Category description cannot be empty");
        }
        $this->value = $value;
    }
    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
