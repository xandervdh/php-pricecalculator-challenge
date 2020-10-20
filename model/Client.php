<?php
declare(strict_types=1);




class Client
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $sql = "SELECT id, firstname, lastname FROM customer";
        $result = $pdo->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
            }

        } else {
            echo "0 results";
        }
    }
}

