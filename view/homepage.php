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
                echo '<input type="submit" class="btn" value="buy" name=" '. $product->getProductname() . '">';
                echo '</div>';
            }

            ?>
        <label for="quantity">Choose quantity:</label>
        <select class='option-box' id="quantity" name="quantity">
            <option value="empty" selected>- Choose option -</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <?php
            for ($i = 10; $i <= 1000; $i += 10) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select><br>
        <input type="submit" value="Calculate" class="btn">
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
