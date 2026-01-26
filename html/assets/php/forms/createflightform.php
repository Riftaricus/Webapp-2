<?php
require_once(__DIR__ . "/../functions/session.php");
require_once(__DIR__ . "/../functions/flights.php");
require_once(__DIR__ . "/../functions/user.php");

$success = 0;

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true || !isUserAdmin($_SESSION['username'])) {
	header("Location: /admin.php?createSuccess=0");
	exit;
}

if (
	isset($_POST['save'], $_POST['from'], $_POST['to'], $_POST['flightcost'], $_POST['flightduration']) &&
	is_numeric($_POST['from']) &&
	is_numeric($_POST['to']) &&
	is_numeric($_POST['flightcost']) &&
	is_numeric($_POST['flightduration'])
) {
	$from = (int) $_POST['from'];
	$to = (int) $_POST['to'];
	$cost = (int) $_POST['flightcost'];
	$duration = (int) $_POST['flightduration'];

	if ($from !== $to && $cost >= 0 && $duration >= 0) {
		createFlight($cost, $duration, $from, $to);
		$success = 1;
	}
}

header("Location: /admin.php?createSuccess=$success");
exit;
?>
