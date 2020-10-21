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
            <input type="submit" value="Confirm" class="btn">
        </form>
    </div>

<?php require 'includes/footer.php'; ?>
