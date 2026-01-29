<?php
require_once "../functions/session.php";
require_once "../functions/bookedFlights.php";

$success = 0;

if (!isset($_POST['flightId']) || !isset($_SESSION['username'])) {
    header("Location: /flights.php?createSuccess=$success");
	exit;
}

$success = 1;

bookFlight((int) $_POST['flightId']);


header("Location: /flights.php?success=$success");
exit;
?>