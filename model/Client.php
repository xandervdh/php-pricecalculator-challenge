<?php
declare(strict_types=1);


class Client
{
    //we're creating a single client object so we're defining variables which we'll need to do so.
    private string $firstName;
    private string $lastName;
    //the ID the client belongs to as member of a group.
    private int $groupId;
    private PDO $pdo;

    private $fixedDiscounts;
    private $varDiscount;
    // the array we'll be storing ALL the clients group ids in. CLient can belong to one group but whilst as a member of that group
    // that group can be a child of another group (the parent).
    private array $customerGroups = [];

    // passing these variables as parameters will make them required, this way we'll get errors when not  filling in the complete client object.
    public function __construct(string $firstName, string $lastName, int $groupId, PDO $pdo, $fixedDiscounts, $varDiscounts)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->groupId = $groupId;
        $this->pdo = $pdo;
        $this->fixedDiscounts = $fixedDiscounts;
        $this->varDiscount = $varDiscounts;
        $this->getGroups();
    }

    //
    public function getGroups(): void
    {
        $groupId = $this->groupId;

        // DO this WHILE $groupId isn't null/empty/...
        do {
            // following handler is preparing (selecting data from table by parameters), setting the parameters used, and executing.
            $handler = $this->pdo->prepare('SELECT * FROM customer_group WHERE id = :id');
            $handler->bindValue(':id', $groupId);
            $handler->execute();
            // handler is getting the requested data/value and then pussing them into an array.
            $customerGroup = $handler->fetch();
            array_push($this->customerGroups, $customerGroup);
            // parent_id is the main group to whom the client belongs to, we need this to check discount values;
            $groupId = $customerGroup['parent_id'];
        } while ($groupId != null);
    }

    // getters, we need to generate these to access private properties

    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getCustomerGroups(): array
    {
        return $this->customerGroups;
    }

    public function getFixedDiscounts()
    {
        return $this->fixedDiscounts;
    }

    public function getVarDiscount()
    {
        return $this->varDiscount;
    }
}
