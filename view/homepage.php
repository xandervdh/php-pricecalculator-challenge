<?php
declare(strict_types=1);

require 'includes/header.php';
?>
<?php echo $success; ?>
    <form method="post">
        <label for="client">Choose a client:</label>
        <select id="client" name="client">
            <option value="empty" selected>- Choose option -</option>
            <?php
            foreach ($clients as $client) {
                echo '<option value="' . $client->getFirstname() . ' ' . $client->getLastname() . '">' . $client->getFirstname() . ' ' . $client->getLastname() . '</option>';
            }
            ?>
        </select><br>
        <label for="product">Choose a product:</label>
        <select id="product" name="product">
            <option value="empty" selected>- Choose option -</option>
            <?php
            foreach ($productsArray as $product) {
                echo '<option value="' . $product->getProductname() . '">' . $product->getProductname() . ' - €' . $product->getProductprice() . '</option>';
            }
            ?>
        </select><br>
        <input type="submit" value="Calculate" class="btn btn-primary">
    </form>


<?php require 'includes/footer.php'; ?>