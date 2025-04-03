<?php

namespace Src\event\category\domain\entities;

use Src\event\category\domain\value_objects\CategoryName;

class Category
{
    private ?int $id;
    private CategoryName $name;
    private  ?string $description;

    public function __construct(?int $id ,CategoryName $name,?string $description)
    {
        $this ->id = $id;
        $this ->name = $name;
        $this ->description = $description;
    }
    public function getId(): int {
        return $this->id;
    }
    public function getName(): CategoryName {
        return $this->name;
    }
    public function getDescription(): ?string {
        return $this->description;
    }
}
