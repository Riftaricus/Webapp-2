<?php
require_once(__DIR__ . "/../functions/session.php");
require_once(__DIR__ . "/../functions/user.php");

$success = 0;

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true || !isUserAdmin($_SESSION['username'])) {
    header("Location: /admin.php?createUserSuccess=0");
    exit;
}

if (
    isset($_POST['save'], $_POST['createusername'], $_POST['createpassword'], $_POST['createlanguage'], $_POST['createisadmin']) &&
    !empty($_POST['createusername']) &&
    !empty($_POST['createpassword'])
) {
    $username = $_POST['createusername'];
    $password = $_POST['createpassword'];
    $language = $_POST['createlanguage'];
    $isAdmin = $_POST['createisadmin'] === 'isadmin';

    if (strlen($username) >= 3 && strlen($password) >= 6) {
        createAccount($username, $password, $language, $isAdmin);
        $success = 1;
    }
}

header("Location: /admin.php?createUserSuccess=$success");
exit;
?>
