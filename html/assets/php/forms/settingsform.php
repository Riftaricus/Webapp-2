<?php
require_once(__DIR__ . "/../functions/session.php");
require_once(__DIR__ . "/../functions/user.php");

$success = 0;

if (empty($_SESSION['userId'])) {
    header("Location: /index.php?settingsSuccess=0");
    exit;
}

$userId = $_SESSION['userId'];
$currentUser = getUserById($userId);

if (!$currentUser) {
    header("Location: /index.php?settingsSuccess=0");
    exit;
}

if (isset($_POST['save'])) {
    $newUsername = isset($_POST['username']) ? trim((string) $_POST['username']) : '';
    $newPassword = isset($_POST['password']) ? (string) $_POST['password'] : '';
    $currentPassword = isset($_POST['current-password']) ? (string) $_POST['current-password'] : '';
    $newLanguage = isset($_POST['language']) ? (string) $_POST['language'] : 'EN';

    if (empty($newUsername) || strlen($newUsername) >= 45) {
        $newUsername = $currentUser['Username'];
    }

    if (!in_array($newLanguage, ['EN', 'NL'])) {
        $newLanguage = 'EN';
    }

    $isAdmin = (bool) $currentUser['IsAdmin'];
    editUser($userId, $newUsername, $newLanguage, $isAdmin);

    if ($newUsername !== $currentUser['Username']) {
        $_SESSION['username'] = $newUsername;
    }

    if (!empty($newPassword) && !empty($currentPassword) && strlen($newPassword) <= 45) {
        if (password_verify($currentPassword, $currentUser['Password'])) {
            updateUserPassword($userId, $newPassword);
        }
    }

    $success = 1;
}

$redirect = $_SERVER['HTTP_REFERER'] ?? '/index.php';
$separator = (strpos($redirect, '?') !== false) ? '&' : '?';

header("Location: {$redirect}{$separator}settingsSuccess={$success}");
exit;
?>
