<?php
require_once("../functions/session.php");
require_once("../functions/user.php");

$success = 0;

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true || !isUserAdmin($_SESSION['username'])) {
    header("Location: /admin.php?userSuccess=0");
    exit;
}

if (isset($_POST['delete'], $_POST['userid']) && is_numeric($_POST['userid'])) {
    $id = $_POST['userid'];

    if ($id != $_SESSION['userId']) {
        deleteUser($id);
        $success = 1;
    }
}

elseif (
    isset($_POST['save'], $_POST['userid'], $_POST['username'], $_POST['language'], $_POST['isadmin']) &&
    is_numeric($_POST['userid']) &&
    !empty($_POST['username'])
) {
    $id = $_POST['userid'];
    $username = $_POST['username'];
    $language = $_POST['language'];
    $isAdmin = $_POST['isadmin'] === 'isadmin';

    editUser($id, $username, $language, $isAdmin);
    $success = 1;
}

header("Location: /admin.php?userSuccess=$success");
exit;
?>
