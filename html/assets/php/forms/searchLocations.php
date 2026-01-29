<?php

require_once("../functions/flights.php");


$success = true;



$countryId = $_POST["searchbar"];

header("Location: /locations.php" . "?searchmenu=" . $countryId . "#" . getCountryIdFromName($_POST["searchbar"]));
exit;
?>