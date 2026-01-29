<?php
require_once "../functions/session.php";
require_once "../functions/bookedFlights.php";

$success = 0;

$success = 1;

bookFlight((int) $_POST['flightId']);


header("Location: /flights.php?success=$success");
exit;
?>