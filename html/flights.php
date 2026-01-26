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
    <?php include './assets/php/header.php' ?>
    <main class="flex gap-100 flexcolumn">
        <?php

        $i = 1;

        $flights = getFlights();


        foreach ($flights as $flight) {
            switch ($i) {
                case 1:
                    $i = 0;
                    echo '        <div class="leftflightbox flex flexrow">
    <div class="leftflightboxmain">
            <h2>
                From ' . getCountryNameFromId($flight['From_Country_Id']) . '
                <br>
                To ' . getCountryNameFromId($flight['To_Country_Id']) . '
                
                </h2>
    </div>
    <div class="leftflightboxsecondary flex flexcolumn">
    </div>
</div>';
                    break;
                case 0:
                    $i = 1;
                    echo '        <div class="rightflightbox flex flexrow">
            <div class="rightflightboxsecondary flex flexcolumn">
            </div>
            <div class="rightflightboxmain">
            <h2>
                From ' . getCountryNameFromId($flight['From_Country_Id']) . '
                <br>
                To ' . getCountryNameFromId($flight['To_Country_Id']) . '
                
                </h2>
            </div>
        </div>';
                    break;
            }
        }

        ?>
    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>