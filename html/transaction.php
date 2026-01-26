<!DOCTYPE html>
<html lang="en">
<?php include("assets/php/head.php") ?>

<body>
    <main class="flex justifycontentcenter alignitemscenter">
        <form action="./assets/php/forms/transaction.php" method="get" class="transaction-form">
            <h2>Bank Information</h2>

            <div class="form-group">
                <label for="baAcNum">Bank Account Number</label>
                <input type="number" name="baAcNum" id="baAcNum" placeholder="Enter your bank account number"
                    minlength="8" maxlength="12" required>
            </div>

            <div class="form-group">
                <label for="baCaNum">Bank Card Number</label>
                <input type="number" name="baCaNum" id="baCaNum" placeholder="Enter your bank card number" required>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </main>
</body>

</html>