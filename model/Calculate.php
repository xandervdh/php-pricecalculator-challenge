<?php
declare(strict_types=1);

class Calculate
{
    private PDO $pdo;
    private Client $customer;
    private Product $product;
    private array $customerGroups;
    private float $discount;
    private array $calculation = [];
    private int $quantity;

    public function __construct(PDO $pdo, Productloader $product, string $productName, Customers $clients, string $client, int $quantity)
    {
        $this->pdo = $pdo; //database connection
        $products = $product->getProducts(); //get array of objects with all products
        foreach ($products as $product) {
            if ($product->getProductname() == $productName) { //get the product with the same name as selected
                $this->product = $product; //set product property to chosen product
            }
        }
        $customers = $clients->getCustomers(); //get array of objects with all customers
        foreach ($customers as $customer) {
            if ($customer->getLastName() === $client) { //get the customer with the same last name as selected
                $this->customer = $customer; //set customer property to chosen customer
                $this->customerGroups = $this->customer->getCustomerGroups(); //set customer groups property to all the groups of the chosen customer
            }
        }

        $this->quantity = $quantity;
    }
    //calculate the fixed discount from the groups
    public function calcFixedDiscount(): int
    {
        $fixedDiscount = 0;
        foreach ($this->customerGroups as $group) {
            $fixedDiscount += $group['fixed_discount'];
        }
        return $fixedDiscount;
    }
    //select the highest variable discount from the groups
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
    //select the group discount that has the most value
    public function discountComparison(): array
    {
        $price = $this->product->getProductprice(); //get the price of the product
        $fixedDisc = $this->calcFixedDiscount(); //get the fixed discount
        $variabledisc = $this->calcVariableDiscount(); //get the variable discount
        $percentage = ($price / 100) * $variabledisc; //calculate the value that will be substracted
        $fixed = $fixedDisc * 100; //change the fixed discount from euros to cents
        $discount = [];

        if ($fixed < $percentage) {
            array_push($discount, $variabledisc, true); //true means its a variable discount
        } else {
            array_push($discount, $fixed, false); //false means its a fixed discount
        }
        $this->discount = $discount[0]; //set discount property to the chosen discount
        return $discount;
    }
    //if the group and the customer have a variable discount, choose the highest
    public function checkCustomerDiscount(): array
    {
        $bool = false; //default is false which means that the customer and the group have different types of discount
        $discount = $this->discountComparison();
        if ($discount[1] == true && $this->customer->getVarDiscount() != null) {
            $variableDiscCustomer = ($this->product->getProductprice() / 100) * $this->customer->getVarDiscount(); //get value that will be substracted
            $variableDiscGroup = ($this->product->getProductprice() / 100) * $discount[0]; //get value that will be substracted
            $bool = true; //set to true because the customer and the group have a variable discount
            if ($variableDiscGroup < $variableDiscCustomer) {
                $this->discount = intval($this->customer->getVarDiscount());
                array_push($this->calculation, 'customer'); //adding the customer so we know where the variable discount comes from
            } else {
                array_push($this->calculation, 'group'); //adding the group so we know where the variable discount comes from
            }
        }
        array_push($discount, $bool);
        return $discount;
    }
    //now that we have all discount we do the final calculation
    public function calculateDiscount(): float
    {
        //set the variable to group or customer to know where the percentage comes from
        $groupOrCustumor = "";
        if (!empty($this->calculation)){
            if ($this->calculation[0] === 'customer'){
                $groupOrCustumor = 'Customer';
            } else {
                $groupOrCustumor = 'Group';
            }
            $this->calculation = []; //empty calculation again so we don't get errors
        }
        $price = $this->product->getProductprice(); //get the price
        $discount = $this->checkCustomerDiscount(); //get the chosen discount
        $quantityDisc = ($price/100) * $this->quantity; //the value of the quantity discount to substract
        $price = $price - $quantityDisc; //result of price minus quantity discount
            //if the customer and the group have a variable discount
        if ($discount[2]) {
            $percentage = ($price / 100) * $this->discount;
            $total = $price - $percentage;
            array_push($this->calculation, 'Quantity discount: ' . $this->quantity . '%', $groupOrCustumor . ': ' . $this->discount . '%'); //push the price calculation
            //if the group has a variable iscount and the customer has a fixed discount
        } elseif ($discount[1] == true && $this->customer->getFixedDiscounts() != null) {
            $total = $price - ($this->customer->getFixedDiscounts()) * 100;
            $percentage = ($total / 100) * $this->discount;
            $total = $total - $percentage;
            array_push($this->calculation, 'Quantity discount: ' . $this->quantity . '%', 'Customer: €' . $this->customer->getFixedDiscounts(), 'Group: ' . $this->discount . '%'); //push the price calculation
            //if the group has a fixed discount and the customer a variable discount
        } elseif ($discount[1] == false && $this->customer->getVarDiscount() != null) {
            $total = $price - $discount[0];
            $percentage = ($total / 100) * $this->customer->getVarDiscount();
            $total -= $percentage;
            array_push($this->calculation, 'Quantity discount: ' . $this->quantity . '%', 'Group: €' . $discount[0]/100, 'Customer: ' . $this->customer->getVarDiscount() . '%'); //push the price calculation
            //else the group and the customer have a fixed discount
        } else {
            $total = $price - $discount[0];
            $total -= $this->customer->getFixedDiscounts();
            array_push($this->calculation, 'Quantity discount: ' . $this->quantity . '%', 'Group: €' . $discount[0]/100, 'Customer: €' . $this->customer->getFixedDiscounts()); //push the price calculation
        }
        //if the total price is negative change total price to zero
        if ($total < 0) {
            $total = 0;
        }
        //change the total price from cents to euro's
        $total = $total / 100;
        return $total;
    }
    //get the calculation array
    public function getCalculation(): array
    {
        return $this->calculation;
    }

}