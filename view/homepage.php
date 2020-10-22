<?php
declare(strict_types=1);

require 'includes/header.php';

?>

    <div class="form-container">
        <form method="post">
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
            <label for="quantity">Choose quantity:</label>
            <select class='option-box' id="quantity" name="quantity">
                <option value="empty" selected>- Choose option -</option>
                <option value="1" >1</option>
                <option value="2" >2</option>
                <option value="3" >3</option>
                <option value="4" >4</option>
                <option value="5" >5</option>
                <option value="6" >6</option>
                <option value="7" >7</option>
                <option value="8" >8</option>
                <option value="9" >9</option>
                <?php
                for ($i = 10; $i <= 1000; $i += 10){
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                ?>
            </select><br>
            <input type="submit" value="Calculate" class="btn">
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
