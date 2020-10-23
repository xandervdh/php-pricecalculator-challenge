<?php
declare(strict_types=1);

require 'includes/header.php';

?>
<!--body wrap is used to manipulate the the main div on the body-->
<div class="body-wrap">
    <!-- Start Category Div -->
    <div id="categories">
        <form method="post">
            <select name="category" id="category">
                <option value="all" selected>All</option>
                <?php
                // Loop through the items in $categories array and display them in the drop down menu as separate entities
                foreach ($categories as $category) {
                    echo '<option value="' . $category . '">' . $category . '</option>';
                }
                ?>
            </select><br/>
            <!-- all buttons share the btn class but are defined by ids -->
            <input type="submit" id="catButton" class="btn" name="submit" value="Confirm">
        </form>
    </div>
    <!-- End Category Div -->
    <!-- with help from Bootstrap we echo a simple success alert once conditions have been met -->
    <div id="echo-success"><?php echo $message; ?></div>
    <!-- Start Result Div -->
    <div id="result" <?php if (!isset($calculation)){ echo 'style="display:none;"'; } ?>>
        <?php
        // checking if there was a call upon calculate and if so display end result.
        if (isset($calculation)){
            foreach ($calculation as $value){
                echo $value . '<br>';
            }
        }
        if (isset($total)) {
            echo 'Your total will be €' . number_format($total, 2, ',', '.') . '/piece<br/>';
        }
        ?>
    </div>
    <!-- End Result Div -->
    <!-- Start Product -->
    <div class='product' id="product">
        <?php
        var_dump($calculation);
        //if no category is set the page will default show all products
        if (!isset($_POST['category']) || $_POST['category'] == 'all') {
            //whilst doing this it will set each item in the products array and echo it in a bootstrap card.
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
                echo '<option value="empty" selected>Quantity</option>';
                // Quantity select dropdown for each iteration it will first count up by 1 starting from 10 it'll increase by 10 and starting from 100 by 100

                for ($i = 1; $i < 10; $i++) { //changed the value for discount per quantity
                    echo '<option value="0">' . $i . '</option>';
                }

                for ($i = 10; $i < 100; $i += 10) {
                    echo '<option value="0">' . $i . '</option>';
                }
                for ($i = 100; $i < 1000; $i += 100) {
                    echo '<option value="10">' . $i . '</option>';
                }
                echo '<option value="20">1000</option>';
                echo '</select><br>';
                //hidden input will link selected product with product name in array.
                echo '<input type="hidden" name="selectedProduct" value="' . $product->getProductname() . '">';
                echo '<input type="submit" id="buyButton" class="btn text-center" name="submit" value="Buy">';
                echo '</div>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            //if a category is set, page will display only the products with the associated category. same manner as above
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
