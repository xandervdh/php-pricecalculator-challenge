<?php
declare(strict_types=1);


class Client
{
    private $firstName;
    private $lastName;
    private $id;
    public function __construct($firstName, $lastName, $id)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }
    public function getId()
    {
        return $this->id;
    }

}

