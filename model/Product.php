<?php
declare(strict_types=1);


class Product
{
    private string $productname;
    private float $productprice;

    public function __construct($productname, $productprice)
    {
        $this->productname = $productname;
        $this->productprice = $productprice;


    }


    public function getProductname(): string //to get the private properties
    {
        return $this->productname;
    }

    public function getProductprice():float
    {
        return $this->productprice;
    }

}


