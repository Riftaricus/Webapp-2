<?php
require_once("../functions/session.php");
require_once("../functions/ratings.php");

if (isset($_POST['rating'], $_POST['message'])) {
    if (isset($_SESSION['userId'])) {
        $rating = max(0, min(5, (int) $_POST['rating']));
        $message = htmlspecialchars($_POST['message']);
        leaveRating($_SESSION['userId'], $message, $rating);
        echo json_encode(['success' => true]);
        exit;

    }
    exit;
}
