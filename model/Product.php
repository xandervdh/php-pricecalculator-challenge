<?php
declare(strict_types=1);


class Product
{
    private string $productname;
    private $productprice;
    private $productId;

    public function __construct($productname, $productprice)
    {
        $this->productname = $productname;
        $this->productprice = $productprice;


    }


    public function getProductname(): string //to get the private properties
    {
        return $this->productname;
    }

    public function getProductprice()
    {
        return $this->productprice;
    }

}
// $p = new Product();

