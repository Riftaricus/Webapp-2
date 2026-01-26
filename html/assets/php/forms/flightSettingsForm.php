<?php
require_once("../functions/session.php");
require_once("../functions/flights.php");
require_once("../functions/user.php");
require_once("../functions/bookedFlights.php");

$success = 0;

if (isset($_POST['delete'], $_POST['flightid']) && is_numeric($_POST['flightid'])) {
    $id = $_POST['flightid'];
    removeAllBookedFlightsById($id);
    deleteFlight($id);
    $success = 1;
}
elseif (
    isset($_POST['save'], $_POST['flightcost'], $_POST['flightduration'], $_POST['flightid']) && 
    is_numeric($_POST['flightcost']) && 
    is_numeric($_POST['flightduration']) &&
    is_numeric($_POST['flightid'])
) {
    $cost = $_POST['flightcost'];
    $duration = $_POST['flightduration'];
    $id = $_POST['flightid'];

    editFlight($cost, $duration, $id);
    $success = 1;
}

header("Location: /admin.php?success=$success");
exit;
?>