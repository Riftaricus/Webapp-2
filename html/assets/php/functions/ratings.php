<?php
require_once(__DIR__ . "/connection.php");

function getAverageRatingSQL()
{
    global $connect;
    $sql = "SELECT Rating FROM Review";

    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getAverageRating()
{
    $result = getAverageRatingSQL();

    $averageRating = 0;

    $totalRating = 0;

    $amountOfReviews = 0;

    foreach ($result as $row) {
        $totalRating += $row['Rating'];

        $amountOfReviews++;
    }

    if ($amountOfReviews === 0) {
        $averageRating = 0;
    } else {

        $averageRating = $totalRating / $amountOfReviews;
    }

    $averageRating = round($averageRating, 1);

    return $averageRating;
}

function leaveRating($rating, $message, $userId)
{
    if (empty($userId) || $rating < 1 || $rating > 5) {
        return;
    }

    global $connect;
    $sql = "
        INSERT INTO `Review` 
        (Rating, Message, User_Id)
        VALUES 
        (:rating, :message, :userid)
    ";

    $stmt = $connect->prepare($sql);
    $stmt->execute([
        ':rating' => $rating,
        ':message' => $message,
        ':userid' => $userId,
    ]);

    return $connect->lastInsertId();
}

function getRatings()
{
    global $connect;
    $sql = 'SELECT * FROM Review';

    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
?>