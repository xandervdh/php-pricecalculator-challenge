<?php
declare(strict_types=1);

require 'includes/header.php';
?>
<?php echo $success; ?>
<div class="form-container">
    <form method="post">
        <label for="client">Choose a client:</label>
        <select class='option-box' id="client" name="client">
                <option value="empty" selected>- Choose option -</option>
            <?php
            foreach ($clients as $client) {
                echo '<option value="' . $client->getFirstname() . ' ' . $client->getLastname() . '">' . $client->getFirstname() . ' ' . $client->getLastname() . '</option>';
            }
            ?>
        </select><br>
        <label for="product">Choose a product:</label>
        <select class='option-box' id="product" name="product">
            <option value="empty" selected>- Choose option -</option>
            <?php
            foreach ($productsArray as $product) {
                //productPrice()/100
                echo '<option value="' . $product->getProductname() . '">' . $product->getProductname() . ' - €' . $product->getProductprice()/100 . '</option>';
            }
            ?>
        </select><br>
        <input type="submit" value="Calculate" class="btn btn-primary">
    </form>
</div>

<?php require 'includes/footer.php'; ?>
