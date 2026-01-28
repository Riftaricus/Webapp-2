<?php
require_once(__DIR__ . "/../functions/bookedFlights.php");
require_once(__DIR__ . "/../functions/session.php");

$success = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel'], $_POST['booking_id'])) {
    $bookingId = (int) $_POST['booking_id'];
    $userId = $_SESSION['userId'] ?? null;

    if ($userId && $bookingId > 0) {
        cancelBooking($bookingId, $userId);
        $success = 1;
    }
}

header("Location: " . ($_SERVER['HTTP_REFERER'] ?? '/' . "?success=$success"));
exit;
?>
