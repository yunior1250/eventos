<?php

namespace Src\event\category\domain\entities;

use JsonSerializable;
use Src\event\category\domain\value_objects\CategoryDescription;
use Src\event\category\domain\value_objects\CategoryName;


class Category implements JsonSerializable
{
    private ?int $id;
    private CategoryName $name;
    private CategoryDescription $description;

    public function __construct(?int $id ,CategoryName $name,CategoryDescription $description)
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
    public function getDescription(): CategoryDescription {
        return $this->description;
    }
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name->getValue(),  // Accediendo al valor de CategoryName
            'description' => $this->description->getValue(),  // Accediendo al valor de CategoryDescription
        ];
    }
}
