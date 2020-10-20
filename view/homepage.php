<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'includes/header.php';
?>

    <form method="post">
        <label for="client">Choose a client:</label>
        <select id="client" name="client">
            <option value="volvo">Volvo</option>
        </select><br>
        <label for="product">Choose a product:</label>
        <select id="product" name="product">
            <option value="volvo">Volvo</option>
        </select><br>
        <input type="submit" value="Calculate" class="btn btn-primary">
    </form>


<?php require 'includes/footer.php'; ?>