<?php
require_once(__DIR__ . "/../functions/session.php");
require_once(__DIR__ . "/../functions/user.php");

$success = 0;

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true || !isUserAdmin($_SESSION['username'])) {
    header("Location: /admin.php?createUserSuccess=0");
    exit;
}

if (
    isset($_POST['save'], $_POST['username'], $_POST['password'], $_POST['language'], $_POST['isadmin']) &&
    !empty($_POST['username']) &&
    !empty($_POST['password'])
) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $language = $_POST['language'];
    $isAdmin = $_POST['isadmin'] === 'isadmin';

    if (strlen($username) >= 3 && strlen($password) >= 6) {
        createAccount($username, $password, $language, $isAdmin);
        $success = 1;
    }
}

header("Location: /admin.php?createUserSuccess=$success");
exit;
?>
