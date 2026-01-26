<?php
require_once("../functions/connection.php");
require_once("../functions/bookedFlights.php");

if (!isset($_POST['flight_id'])) {
    die('Invalid request');
}

$flightId = (int) $_POST['flight_id'];

bookFlight($flightId);

header('Location: /flights.php');
exit;


?>