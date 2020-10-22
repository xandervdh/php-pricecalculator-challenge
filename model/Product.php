<?php
declare(strict_types=1);


class Product
{   //added properties and type
    private string $productname;
    private int $productprice;

    //added method
    public function __construct(string $productname, int $productprice)
    {
        $this->productname = $productname;
        $this->productprice = $productprice;
    }

    // get the private property productname
    public function getProductname(): string
    {
        return $this->productname;
    }

    // get the private property productprice
    public function getProductprice(): int
    {
        return $this->productprice;
    }
}


