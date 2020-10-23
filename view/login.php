<?php
declare(strict_types=1);

require 'includes/header.php';

?>
    <div class="form-container">
        <form method="get">
            <label for="client">Welcome</label>
            <select class='option-box' id="client" name="client"> <!-- dropdown form -->
                <option value="empty" selected>Choose user</option> <!-- default option -->
                <?php
                foreach ($clients as $client) {
                    //echo all the clients
                    echo '<option value="' . $client->getLastname() . '">' . $client->getFirstname() . ' ' . $client->getLastname() . '</option>';
                }
                ?>
            </select><br>
            <input type="submit" value="Login" class="btn">
        </form>
    </div>

<?php require 'includes/footer.php'; ?>
