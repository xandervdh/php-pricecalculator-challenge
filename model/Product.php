<?php
declare(strict_types=1);


class Product
{
    private string $productname;
    private $productprice;
    private $productId;

    public function __construct($productId, $productname, $productprice)
    {
        $this->productname = $productname;
        $this->productprice = $productprice;
        $this->productId = $productId;

    }

    public function getProductId()
    {
        return $this->productId;
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

