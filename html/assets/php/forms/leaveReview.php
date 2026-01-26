<?php
require_once("../functions/session.php");
require_once("../functions/ratings.php");

$success = 0;

if (
    isset($_POST['rating'], $_SESSION['userId']) &&
    is_numeric($_POST['rating']) &&
    is_numeric($_SESSION['userId']) &&
    $_POST['rating'] > 0
) {
    $rating = max(1, min(5, (int) $_POST['rating']));
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    leaveRating($rating, $message, (int) $_SESSION['userId']);
    $success = 1;
}

header("Location: /reviews.php?success=$success");
exit;
?>