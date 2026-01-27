<?php
header('Content-Type: application/json');

require_once(__DIR__ . '/../functions/session.php');
require_once(__DIR__ . '/../functions/user.php');
require_once(__DIR__ . '/../functions/bookedFlights.php');
require_once(__DIR__ . '/../functions/flights.php');

// Check if user is admin
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true || !isUserAdmin($_SESSION['username'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

$userId = isset($_GET['userId']) ? intval($_GET['userId']) : null;

if ($userId === null) {
    echo json_encode(['success' => false, 'error' => 'No user ID provided']);
    exit;
}

$bookedFlights = getBookedFlightsById($userId, true);

$flightsData = [];
foreach ($bookedFlights as $booking) {
    $fromCountry = getCountryNameFromId($booking['From_Country_Id']);
    $toCountry = getCountryNameFromId($booking['To_Country_Id']);
    
    $flightsData[] = [
        'flightId' => $booking['Flight_Id'],
        'fromCountry' => $fromCountry,
        'toCountry' => $toCountry,
        'duration' => $booking['Flight_Duration']
    ];
}

echo json_encode([
    'success' => true,
    'bookedFlights' => $flightsData
]);
?>
