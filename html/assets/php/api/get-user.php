<?php
header('Content-Type: application/json');

require_once(__DIR__ . '/../functions/session.php');
require_once(__DIR__ . '/../functions/user.php');

// Check if user is admin
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true || !isUserAdmin($_SESSION['username'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

$userId = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($userId === null) {
    echo json_encode(['success' => false, 'error' => 'No user ID provided']);
    exit;
}

$user = getUserById($userId);

if ($user) {
    echo json_encode([
        'success' => true,
        'user' => [
            'id' => $user['UserId'],
            'username' => $user['Username'],
            'creationDate' => $user['CreationDate'],
            'language' => $user['Language'],
            'isAdmin' => (bool) $user['IsAdmin']
        ]
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'User not found']);
}
?>
