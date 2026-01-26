<?php
require_once("./flights.php");

session_start();

if (count(getFlights()) == 0) {
    generateRandomFlight(400);
}

if (!isset($_SESSION["userId"])) {
    $_SESSION["username"] = null;
    $_SESSION["userId"] = null;
    $_SESSION["isAdmin"] = false;
}
?>