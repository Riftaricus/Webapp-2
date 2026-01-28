<?php
require_once(__DIR__ . "/../functions/session.php");
require_once(__DIR__ . "/../functions/user.php");

$success = 0;

$username = isset($_POST['username']) ? trim((string) $_POST['username']) : '';
$password = isset($_POST['password']) ? (string) $_POST['password'] : '';

if ($username !== '' && $password !== '') {
    $success = login($username, $password) ? 1 : 0;
}

$redirect = $_SERVER['HTTP_REFERER'] ?? '/index.php';
$separator = (strpos($redirect, '?') !== false) ? '&' : '?';

header("Location: {$redirect}{$separator}loginSuccess={$success}");
exit;
?>
