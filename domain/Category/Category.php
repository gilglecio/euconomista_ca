<?php

namespace Domain\Category;

class Category
{
    private $id;

    private $name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}