<?php
require("assets/php/functions/flights.php");

$flights = getFlights();

$from = getCountryIdFromName(getRandomCountry());

$to = getCountryIdFromName(getRandomCountry());

// createFlight(100, 10, $from, $to);

?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main>
        <section>
            <div
                class="backgroundcolorcfdde0 box flex flexrow alignitemscenter justifycontentcenter wrap adminflightbox">
                <?php
                for ($i = 0; $i < count($flights); $i++) {
                    echo "<div class='adminflights flex alignitemscenter justifycontentcenter flexcolumn'>";
                    $from = $flights[$i]["From_Country_Id"];
                    $to = $flights[$i]["To_Country_Id"];

                    if (!is_array($from)) {
                        $from = [$from];
                    }

                    if (!is_array($to)) {
                        $to = [$to];
                    }
                    echo "<h2>"
                        . getCountryNameFromId($from[0])
                        . "<br>"
                        . " ↓ "
                        . "<br>"
                        . getCountryNameFromId($to[0])
                        . "</h2>";

                    echo "<p>Flight Id: " . $flights[$i]['Flight_Id'] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>

    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>