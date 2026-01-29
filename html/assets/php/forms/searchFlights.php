<?php

require_once("../functions/flights.php");


$success = true;



$flightId = getFlightFromCountry($_POST["searchbar"])[0]["Flight_Id"];

header("Location: /flights.php" . "?searchmenu=" . getCountryIdFromName($_POST["searchbar"]) . "#" . $flightId);
exit;
?>