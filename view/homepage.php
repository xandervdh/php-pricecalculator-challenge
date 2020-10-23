<?php
declare(strict_types=1);

require 'includes/header.php';

?>

<div class="body-wrap">
    <div id="categories">
        <form method="post">
            <select name="category" id="category">
                <option value="all" selected>All</option>
                <?php
                foreach ($categories as $category) {
                    echo '<option value="' . $category . '">' . $category . '</option>';
                }
                ?>
            </select><br/>
            <input type="submit" id="catButton" class="btn" name="submit" value="Confirm">
        </form>
    </div>
    <div id="echo-success"><?php echo $success; ?></div>
    <div id="result">
        <?php
        if (isset($calculation)){
            foreach ($calculation as $value){
                echo $value . '<br>';
            }
        }
        if (isset($total)) {

            echo 'Your total will be €' . number_format($total, 2, ',', '.') . '<br/>';
        }
        ?>
    </div>
    <div class='product' id="product">
        <label for="product">Choose a product:</label>
        <?php
        if (!isset($_POST['category']) || $_POST['category'] == 'all') {
            foreach ($productsArray as $product) {
                echo '<div class="form-card-wrap">';
                echo '<form method="post">';
                echo ' <div class="card ">';
                echo ' <h6 class="card-title product-name">' . $product->getProductname() . '</h6>';
                echo '<p class="card-text">Hair raising or, blood in eyeball. Blood guns bury scream, stab graveyard crazed dark crying.
 Trapped flesh grotesque squeal, bloodcurdling chilling hair-raisin.';
                echo '</p>';
                echo '<p class="card-subtitle mb-2 text-muted product-price">' . '€' . $product->getProductprice() / 100 . '</p>';
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
                echo '<input type="hidden" name="selectedProduct" value="' . $product->getProductname() . '">';
                echo '<input type="submit" id="buyButton" class="btn text-center" name="submit" value="Buy">';
                echo '</div>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            foreach ($productsArray as $product) {
                if ($product->getCategory() == $_POST['category']) {
                    echo '<div class="form-card-wrap">';
                    echo '<form method="post">';
                    echo ' <div class="card ">';
                    echo ' <h6 class="card-title product-name">' . $product->getProductname() . '</h6>';
                    echo '<p class="card-text">Hair raising or, blood in eyeball. Blood guns bury scream, stab graveyard crazed dark crying.
 Trapped flesh grotesque squeal, bloodcurdling chilling hair-raisin.';
                    echo '</p>';
                    echo '<p class="card-subtitle mb-2 text-muted product-price">' . '€' . $product->getProductprice() / 100 . '</p>';
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
                    echo '<input type="hidden" name="selectedProduct" value="' . $product->getProductname() . '">';
                    echo '<input type="submit" id="buyButton" class="btn text-center" name="submit" value="Buy">';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                }
            }
        }

        ?>
    </div>


</div>

<?php require 'includes/footer.php'; ?>
