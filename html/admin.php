<?php
require("assets/php/functions/flights.php");

$flights = getFlights();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/img/icon/logo.png">
    <title>Volare Airways</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include './assets/php/header.php' ?>
    <main>
        <div class="backgroundcolorcfdde0 box flex flexrow alignitemscenter justifycontentcenter wrap adminflightbox">
            <?php

            for ($i = 0; $i < count($flights); $i++) {
                echo "<div class='adminflights'><h2>$flights[i]['From_Country']</h2></div>";
            }
            ?>
        </div>


    </main>
    <?php include './assets/php/footer.php' ?>
    <script src="assets/js/script.js"></script>
</body>

</html>