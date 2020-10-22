<?php
declare(strict_types=1);

require 'includes/header.php';

?>
    <div class="form-container">
        <form method="get">
            <label for="client">Choose a client:</label>
            <select class='option-box' id="client" name="client">
                <option value="empty" selected>- Choose user -</option>
                <?php
                foreach ($clients as $client) {
                    echo '<option value="' . $client->getLastname() . '">' . $client->getFirstname() . ' ' . $client->getLastname() . '</option>';
                }
                ?>
            </select><br>
<<<<<<< HEAD
            <input type="submit" value="Confirm" class="btn">
=======
            <input type="submit" value="Login" class="btn btn-primary">
>>>>>>> c7c3e93619a4137df4c83987e9c05c916df1f680
        </form>
    </div>

<?php require 'includes/footer.php'; ?>
