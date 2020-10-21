<?php
declare(strict_types=1);

class Calculate
{
    private PDO $pdo;
    private int $customerId;
    private int $productId;
    private array $customer;
    private array $product;
    private array $customerGroups = [];
    private float $discount;
    private float $total;

    public function __construct(int $customerId, int $productId, PDO $pdo)
    {
        $this->customerId = $customerId;
        $this->productId = $productId;
        $this->pdo = $pdo;

        $handler = $this->pdo->prepare('SELECT * FROM customer WHERE id = :id');
        $handler->bindValue(':id', $this->customerId);
        $handler->execute();
        $customer = $handler->fetch();
        $this->customer = $customer;

        $handler = $this->pdo->prepare('SELECT * FROM product WHERE id = :id');
        $handler->bindValue(':id', $this->productId);
        $handler->execute();
        $product = $handler->fetch();
        $this->product = $product;
        $this->getGroups();
    }

    public function getGroups()
    {
        $groupId = $this->customer['group_id'];

        do {
            $handler = $this->pdo->prepare('SELECT * FROM customer_group WHERE id = :id');
            $handler->bindValue(':id', $groupId);
            $handler->execute();
            $customerGroup = $handler->fetch();
            array_push($this->customerGroups, $customerGroup);

            $groupId = $customerGroup['parent_id'];
        } while ($groupId != null);

    }

    public function calcFixedDiscount()
    {
        $fixedDiscount = 0;
        foreach ($this->customerGroups as $group) {
            $fixedDiscount += $group['fixed_discount'];
        }
        return $fixedDiscount;
    }

    public function calcVariableDiscount()
    {
        $i = 0;
        $variabledisc = 0;
        do {
            if ($variabledisc <= $this->customerGroups[$i]['variable_discount']) {
                $variabledisc = $this->customerGroups[$i]['variable_discount'];
            }
            $i++;
        } while ($i < count($this->customerGroups));
        return $variabledisc;
    }

    public function discountComparison()
    {
        $price = $this->product['price'];
        $fixedDisc = $this->calcFixedDiscount();
        $variabledisc = $this->calcVariableDiscount();
        $percentage = ($price / 100) * $variabledisc;
        $fixed = $fixedDisc * 100;
        $discount = [];

        if ($fixed < $percentage) {
            array_push($discount, $percentage, true);
        } else {
            array_push($discount, $fixed, false);
        }
        $this->discount = $discount[0];
        return $discount;
    }

    public function checkCustomerDiscount()
    {
        $bool = false;
        $discount = $this->discountComparison();
        if ($discount[1] == true && $this->customer['variable_discount'] != null) {
            $variableDisc = ($this->product['price'] / 100) * $this->customer['variable_discount'];
            $bool = true;
            if ($discount[0] < $variableDisc) {
                $this->discount = $variableDisc;
            } else {
                $this->discount = $discount[0];
            }
        }
        array_push($discount, $bool);
        return $discount;
    }

    public function calculateDiscount()
    {
        $price = $this->product['price'];
        $discount = $this->checkCustomerDiscount();
        if ($discount[2]){
            $this->total = $price - $this->discount;
        } elseif($discount[1] == true && $this->customer['fixed_discount'] != null) {
            $this->total = $price - $this->customer['fixed_discount'];
            $this->total -=  $this->discount;
        } elseif($discount[1] == false && $this->customer['variable_discount'] != null){
            $this->total = $price - $discount[0];
            $percentage = ($price / 100) * $this->customer['variable_discount'];
            $this->total -=  $percentage;
        } else{
            $this->total = $price - $discount[0];
            $this->total -= $this->customer['fixed_discount'];
        }
        if ($this->total < 0){
            $this->total = 0;
        }
        $this->total = $this->total/100;
        return $this->total;
    }
}