<?php
header('Content-Type: application/json');

require_once(__DIR__ . '/../functions/session.php');
require_once(__DIR__ . '/../functions/flights.php');

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

$flightId = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($flightId === null) {
    echo json_encode(['success' => false, 'error' => 'No flight ID provided']);
    exit;
}

$flight = getFlights($flightId);

if ($flight && count($flight) > 0) {
    $flightData = $flight[0];
    
    echo json_encode([
        'success' => true,
        'flight' => [
            'id' => $flightData['Flight_Id'],
            'cost' => $flightData['Flight_Cost'],
            'duration' => $flightData['Flight_Duration'],
            'fromCountry' => getCountryNameFromId($flightData['From_Country_Id']),
            'toCountry' => getCountryNameFromId($flightData['To_Country_Id']),
            'fromCountryId' => $flightData['From_Country_Id'],
            'toCountryId' => $flightData['To_Country_Id']
        ]
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Flight not found']);
}
?>
