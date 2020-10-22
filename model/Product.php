<?php
declare(strict_types=1);


class Product
{   //added properties and type
    private string $productname;
    private int $productprice;
    private $category;

    //added method
    public function __construct(string $productname, int $productprice, $category)
    {
        $this->productname = $productname;
        $this->productprice = $productprice;
        $this->category = $category;
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


    public function getCategory(): string
    {
        return $this->category;
    }



}


