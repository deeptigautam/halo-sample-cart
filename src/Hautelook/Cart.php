<?php
namespace Hautelook;

class Cart
{
    protected $products;
    protected $discount;

    public function __construct()
    {
        $this->products = [];
        $this->discount = 0;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function subtotal()
    {
        $subtotal = 0;
        foreach ($this->products as $product) {
            $subtotal += $product->getPrice();
        }

        return $subtotal * (100 - $this->discount)/100;
    }

    public function quantityByProductName($name)
    {
        $quantity = 0;
        foreach ($this->products as $product) {
            if ($product->getName() == $name)
                $quantity += 1;
        }
        return $quantity;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function total()
    {
        $totalweight = 0;
        $shipping = 0;

        foreach ($this->products as $product) {
            $totalweight += $product->getWeight();
        }

        if ($totalweight > 10)
        {
            $shipping = 20;
        }
        elseif ($this->subtotal() < 100 && $totalweight < 10)
        {
            $shipping = 5;
        }

        return $this->subtotal() + $shipping;
    }

    public function itemCount()
    {
        $count = 0;
        foreach ($this->products as $product) {
            $count ++;
        }

        return $count;
    }
} 
