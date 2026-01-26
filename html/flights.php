<?php require_once("assets/php/functions/session.php");
require_once("assets/php/functions/locations.php");
require_once("assets/php/functions/flights.php");

if (count(getFlights()) == 0) {
    generateRandomFlight(27);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>

    <?php include './assets/php/header.php'; ?>

    <main class="flex gap-100 flexcolumn">
        <?php
        $i = 1;
        $flights = getFlights();

        foreach ($flights as $flight) {
            switch ($i) {
                case 1:
                    $i = 0;
                    echo '
                    <div class="leftflightbox flex flexrow">
                        <div class="leftflightboxmain">
                            <h2>
                                From ' . getCountryNameFromId($flight['From_Country_Id']) . '<br>
                                To ' . getCountryNameFromId($flight['To_Country_Id']) . '
                            </h2>
                        </div>

                        <div class="leftflightboxsecondary flex flexcolumn">
                            <form method="post" action="/assets/php/forms/booking.php">
                                <input type="hidden" name="flight_id" value="' . $flight["Flight_Id"] . '">
                                <button type="submit" class="green-button">
                                    Book Flight
                                </button>
                            </form>
                        </div>
                    </div>';
                    break;

                case 0:
                    $i = 1;
                    echo '
                    <div class="rightflightbox flex flexrow">
                        <div class="rightflightboxsecondary flex flexcolumn">
                            <form method="post" action="/assets/php/forms/booking.php">
                                <input type="hidden" name="flight_id" value="' . $flight["Flight_Id"] . '">
                                <button type="submit" class="green-button">
                                    Book Flight
                                </button>
                            </form>
                        </div>

                        <div class="rightflightboxmain">
                            <h2>
                                From ' . getCountryNameFromId($flight['From_Country_Id']) . '<br>
                                To ' . getCountryNameFromId($flight['To_Country_Id']) . '
                            </h2>
                        </div>
                    </div>';
                    break;
            }
        }
        ?>

        <div class="flex justifycontentcenter alignitemscenter hidden" id="transaction">
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
        </div>
    </main>

    <?php include './assets/php/footer.php' ?>
</body>

</html>