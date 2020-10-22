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
                echo '<option value="1">1</option>';
                echo '<option value="2">2</option>';
                echo '<option value="3">3</option>';
                echo '<option value="4">4</option>';
                echo '<option value="5">5</option>';
                echo '<option value="6">6</option>';
                echo '<option value="7">7</option>';
                echo '<option value="8">8</option>';
                echo '<option value="9">9</option>';

                for ($i = 10; $i <= 1000; $i += 10) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }

                echo '</select><br>';
                echo '<input type="submit" class="btn" value="buy" name=" '. $product->getProductname() . '">';
                echo '</div>';


            }

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
