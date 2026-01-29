<?php
header('Content-Type: application/json');

require_once(__DIR__ . '/../functions/session.php');
require_once(__DIR__ . '/../functions/ratings.php');

$ratings = getRatings();

if ($ratings) {
    echo json_encode([
        'success' => true,
        'ratings' => $ratings
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Rating not found']);
}
?>