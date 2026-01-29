<?php require_once("assets/php/functions/session.php");
require_once("assets/php/functions/locations.php");
require_once("assets/php/functions/flights.php");

if (count(getFlights()) == 0) {
    generateRandomFlight(amount: 84);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>

    <?php include './assets/php/header.php'; ?>

    <main class="flex gap-25 flexcolumn alignitemscenter" style="padding: 2rem;">
        <?php
        $i = 1;
        $flights = getFlights();

        foreach ($flights as $flight) {
            switch ($i) {
                case 1:
                    $i = 0;
                    echo '
                    <div class="leftflightbox flex flexrow">
                        <div class="leftflightboxmain flex justifycontentcenter alignitemscenter flexcolumn">
                            <h2>
                                ' . getCountryNameFromId($flight['From_Country_Id']) . ' → ' . getCountryNameFromId($flight['To_Country_Id']) . '
                            </h2>
                            <div class="flight-meta flex flexrow gap-10">
                                <div>Cost: $' . htmlspecialchars((string) $flight['Flight_Cost']) . '</div>
                                <div>Duration: ' . htmlspecialchars((string) $flight['Flight_Duration']) . 'h</div>
                            </div>
                        </div>

                        <div class="leftflightboxsecondary flex flexrow justifycontentspaceevenly alignitemscenter" id="' . $flight["Flight_Id"] . '">
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
                        <div class="rightflightboxsecondary flex flexrow justifycontentspaceevenly alignitemscenter" id="' . $flight["Flight_Id"] . '">
                            <div class="flight-meta">
                                <div>Cost: $' . htmlspecialchars((string) $flight['Flight_Cost']) . '</div>
                                <div>Duration: ' . htmlspecialchars((string) $flight['Flight_Duration']) . 'h</div>
                            </div>
                            <form method="post" action="/assets/php/forms/booking.php">
                                <input type="hidden" name="flight_id" value="' . $flight["Flight_Id"] . '">
                                <button type="submit" class="green-button">
                                    Book Flight
                                </button>
                            </form>
                        </div>

                        <div class="rightflightboxmain  flex justifycontentcenter alignitemscenter flexcolumn">
                            <h2>
                                <strong>' . getCountryNameFromId($flight['From_Country_Id']) . '</strong> → <strong>' . getCountryNameFromId($flight['To_Country_Id']) . '</strong>
                            </h2>
                            <div class="flight-meta flex flexrow gap-10">
                                <div>Cost: $' . htmlspecialchars((string) $flight['Flight_Cost']) . '</div>
                                <div>Duration: ' . htmlspecialchars((string) $flight['Flight_Duration']) . 'h</div>
                            </div>
                        </div>
                    </div>';
                    break;
            }
        }
        ?>

        <section class="flex justifycontentcenter alignitemscenter" id="searchmenu">
            <?php

            $id = $_GET['searchmenu'];

            $set = [];

            foreach (getFlights() as $flight) {
                if ($flight['From_Country_Id'] == $id) {
                    $set[] = $flight;
                }
                if ($flight['To_Country_Id'] == $id) {
                    $set[] = $flight;
                }
            }

            foreach ($set as $flight) {
                $fromCountry = getCountryNameFromId($flight['From_Country_Id']);
                $toCountry = getCountryNameFromId($flight['To_Country_Id']);

                $duration = $flight["Flight_Duration"];
                $flightId = $flight['Flight_Id'];

                echo "<a class='booked-flight-item' href='#" . $flightId . "'>";
                echo "<h4>{$fromCountry} → {$toCountry}</h4>";
                echo "<p>Duration: {$duration} Hours</p>";
                echo "</a>";
            }
            ?>
            <a href="flights.php"><img src="assets/img/Close.svg" class="close" alt="close"></a>
        </section>

        <section class="transaction-section flex justifycontentcenter alignitemscenter" id="transaction"
            style="display: none;" inert>
            <div class="transaction-container">
                <form action="./assets/php/forms/transaction.php" method="post"
                    class="transaction-form flex flexcolumn">
                    <div class="transaction-header flex justifycontentspacebetween alignitemscenter">
                        <h2>Bank Information</h2>
                        <div class="transaction-close">✕</div>
                    </div>

                    <div class="form-group">
                        <label for="baAcNum">Bank Account Number</label>
                        <input type="text" name="baAcNum" id="baAcNum" placeholder="Enter your bank account number"
                            minlength="8" maxlength="18" required>
                    </div>

                    <input type="hidden" name="flightId" id="flightId">

                    <div class="form-group">
                        <label for="baCaNum">Bank Card Number</label>
                        <input type="text" name="baCaNum" id="baCaNum" placeholder="Enter your bank card number"
                            minlength="13" maxlength="19" required>
                    </div>

                    <div class="form-group">
                        <label for="baCvv">CVV</label>
                        <input type="password" name="baCvv" id="baCvv" placeholder="CVV" minlength="3" maxlength="4"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="baExpiry">Expiry Date</label>
                        <input type="text" name="baExpiry" id="baExpiry" placeholder="MM/YY" maxlength="5" required>
                    </div>

                    <button type="submit" class="submit-btn">Complete Payment</button>
                </form>
            </div>
        </section>
    </main>

    <?php include './assets/php/footer.php' ?>
</body>

</html>