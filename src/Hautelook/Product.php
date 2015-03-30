<?php

namespace Hautelook;

class Product
{
    protected $name;
    protected $price;
    protected $weight;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public static function productWithWeight($name, $price, $weight)
    {
        $obj = new Product($name,$price);
        $obj->weight = $weight;

        return $obj;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getWeight()
    {
        return $this->weight;
    }
} 
