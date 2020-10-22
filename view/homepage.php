<?php
declare(strict_types=1);

require 'includes/header.php';

?>

<div >
    <div class='product' id="product">
    <form method="post">
        <label for="product">Choose a product:</label>
            <?php

            foreach ($productsArray as $product) {
                echo ' <div class="card">';
                echo ' <h4 class="card-title product-name">' . $product->getProductname() . '</h4>';
                echo '<h6 class="card-subtitle mb-2 text-muted product-price">' .'€' . $product->getProductprice()/100 . '</h6>';
                echo '<p class="card-text">Some quick example text to build on the card title
      and make up the bulk of the cards content.';
                echo '</p>';
                echo '<select class="option-box" id="quantity" name="quantity">';
                echo '<option value="empty" selected>quantity</option>';

                for ($i = 1; $i < 10; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }

                for ($i = 10; $i <= 100; $i += 10) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                for ($i = 200; $i <= 1000; $i += 100) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }

                echo '</select><br>';
                echo '<input type="hidden" name="product" value="'. $product->getProductname() . '">';
                echo '<input type="submit" class="btn" name="submit" value="Buy">';
                echo '</div>';



            }
            var_dump($_POST['product']);
            ?>
    </form>
    </div>
    <div id="echo-success"><?php echo $success; ?></div>
    <div id="result">
        <?php
        if (isset($total)) {
            echo 'Your total will be €' . number_format($total, 2, ',', '.') . '<br/>';
        }
        ?>
    </div>

</div>

<?php require 'includes/footer.php'; ?>
