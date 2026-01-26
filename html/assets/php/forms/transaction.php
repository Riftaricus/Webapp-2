<?php
require_once "../functions/session.php";
require_once "../functions/bookedFlights.php";

$success = 0;

if (
    isset($_POST['baAcNum']) &&
    isset($_POST['baCaNum']) &&
    isset($_POST['flightId']) &&
    is_numeric($_POST['baAcNum']) &&
    is_numeric($_POST['baCaNum'])
) {
    $success = 1;

    bookFlight((int)$_POST['flightId']);
}

header("Location: /flights.php?success=$success");
exit;
?>