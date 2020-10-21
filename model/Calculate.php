<?php
declare(strict_types=1);

class Calculate
{
    private PDO $pdo;
    private Client $customer;
    private Product $product;
    private array $customerGroups;
    private float $discount;
    private array $calculation;

    public function __construct(PDO $pdo, Productloader $product, string $productName, Customers $clients, string $client)
    {
        $this->pdo = $pdo;
        $products = $product->getProducts();
        foreach ($products as $product) {
            if ($product->getProductname() === $productName) {
                $this->product = $product;
            }
        }
        $customers = $clients->getCustomers();
        foreach ($customers as $customer) {
            if ($customer->getLastName() === $client) {
                $this->customer = $customer;
                $this->customerGroups = $this->customer->getCustomerGroups();
            }
        }
    }

    public function calcFixedDiscount(): int
    {
        $fixedDiscount = 0;
        foreach ($this->customerGroups as $group) {
            $fixedDiscount += $group['fixed_discount'];
        }
        return $fixedDiscount;
    }

    public function calcVariableDiscount(): int
    {
        $i = 0;
        $variabledisc = 0;
        do {
            if ($variabledisc <= $this->customerGroups[$i]['variable_discount']) {
                $variabledisc = $this->customerGroups[$i]['variable_discount'];
            }
            $i++;
        } while ($i < count($this->customerGroups));
        return intval($variabledisc);
    }

    public function discountComparison(): array
    {
        $price = $this->product->getProductprice();
        $fixedDisc = $this->calcFixedDiscount();
        $variabledisc = $this->calcVariableDiscount();
        $percentage = ($price / 100) * $variabledisc;
        $fixed = $fixedDisc * 100;
        $discount = [];

        if ($fixed < $percentage) {
            array_push($discount, $variabledisc, true);
        } else {
            array_push($discount, $fixed, false);
        }
        $this->discount = $discount[0];
        return $discount;
    }

    public function checkCustomerDiscount(): array
    {
        $bool = false;
        $discount = $this->discountComparison();
        if ($discount[1] == true && $this->customer->getVarDiscount() != null) {
            $variableDisc = ($this->product->getProductprice() / 100) * $this->customer->getVarDiscount();
            $bool = true;
            if ($discount[0] < $variableDisc) {
                $this->discount = $discount[0];
            }
        }
        array_push($discount, $bool);
        return $discount;
    }

    public function calculateDiscount() :float
    {
        $price = $this->product->getProductprice();
        $discount = $this->checkCustomerDiscount();
        if ($discount[2]) {
            $percentage = ($price/100) * $this->discount;
            $total = $price - $percentage;
        } elseif ($discount[1] == true && $this->customer->getFixedDiscounts() != null) {
            $total = $price - $this->customer->getFixedDiscounts();
            $percentage = ($total/100) * $this->discount;
            $total -= $percentage;
        } elseif ($discount[1] == false && $this->customer->getVarDiscount() != null) {
            $total = $price - $discount[0];
            $percentage = ($total / 100) * $this->customer->getVarDiscount();
            $total -= $percentage;
        } else {
            $total = $price - $discount[0];
            $total -= $this->customer->getFixedDiscounts();
        }
        if ($total < 0) {
            $total = 0;
        }
        $total = $total / 100;
        return $total;
    }
}