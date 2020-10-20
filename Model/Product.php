<?php
declare(strict_types=1);


class Product
{
    private string $productname;
    private integer $productprice;

    public function __construct($productname, $productprice)
    {
        $this->productname = $productname;
        $this->productprice = $productprice;

    }

    public function getProductname(): string //to get the private properties
    {
        return $this->productname;
    }

    /**
     * @return int
     */
    public function getProductprice(): int
    {
        return $this->productprice;
    }

}
// $p = new Product();
//echo $p->getProductname;
//echo $p->getProductprice;
