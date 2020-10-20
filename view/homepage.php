<?php require 'includes/header.php'; ?>

    <form method="post">
        <label for="client">Choose a client:</label>
        <select id="client" name="client">
            <option value="volvo">Volvo</option>
        </select><br>
        <label for="product">Choose a product:</label>
        <select id="product" name="product">
            <option value="volvo">Volvo</option>
        </select><br>
        <input type="submit" class="btn btn-primary">
    </form>


<?php require 'includes/footer.php'; ?>