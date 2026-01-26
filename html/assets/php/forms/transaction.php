<?php
require_once "../functions/session.php";
require_once "../functions/ratings.php";

$success = 0;

if (
    isset($_POST['baAcNum'], $_SESSION['baCaNum']) &&
    is_numeric($_POST['baAcNum']) &&
    is_numeric($_SESSION['baCaNum'])
) {
    $success = 1;
}

header("Location: /flights.php?success=$success");
exit;