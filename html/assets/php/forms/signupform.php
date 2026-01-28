<?php
require_once(__DIR__ . "/../functions/session.php");
require_once(__DIR__ . "/../functions/user.php");

$success = 0;

$username = isset($_POST['username']) ? trim((string) $_POST['username']) : '';
$password = isset($_POST['password']) ? (string) $_POST['password'] : '';
$confirm = isset($_POST['confirm']) ? (string) $_POST['confirm'] : '';

if ($username !== '' && $password !== '' && $confirm !== '') {
    $isValid = (strlen($username) >= 3) && (strlen($password) >= 6) && ($password === $confirm);

    if ($isValid) {
        $existing = runLoginSQL($username);
        if (!$existing) {
            createAccount($username, $password, 'EN', false);

            login($username, $password);
            $success = 1;
        }
    }
}

$redirect = $_SERVER['HTTP_REFERER'] ?? '/index.php';
$separator = (strpos($redirect, '?') !== false) ? '&' : '?';

header("Location: {$redirect}{$separator}signupSuccess={$success}");
exit;
?>
