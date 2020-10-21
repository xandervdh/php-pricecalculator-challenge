<?php
declare(strict_types=1);

require 'includes/header.php';

?>

    <div class="form-container">
        <form method="post">
            <!--<label for="client">Choose user:</label>
            <select class='option-box' id="client" name="client">
                <option value="empty" selected>- Choose option -</option>
                <?php
                foreach ($clients as $client) {
                    echo '<option value="' . $client->getLastname() . '">' . $client->getFirstname() . ' ' . $client->getLastname() . '</option>';
                }
                ?>
            </select><br>-->
            <label for="product">Choose a product:</label>
            <select class='option-box' id="product" name="product">
                <option value="empty" selected>- Choose option -</option>
                <?php
                foreach ($productsArray as $product) {
                    //productPrice()/100
                    echo '<option value="' . $product->getProductname() . '">' . $product->getProductname() . ' - €' . $product->getProductprice() / 100 . '</option>';
                }
                ?>
            </select><br>
            <input type="submit" value="Confirm" class="btn">
        </form>
        <div id="echo-success"><?php echo $success; ?></div>
        <div id="result">
            <?php
            if (isset($total)){
                echo 'Your total will be €' . number_format($total, 2, ',', '.');
            }
            ?>
        </div>

    </div>

<?php require 'includes/footer.php'; ?>
