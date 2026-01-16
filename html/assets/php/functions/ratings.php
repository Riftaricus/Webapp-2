<?php

require("connection.php");
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

    $averageRating = $totalRating / $amountOfReviews;

    $averageRating = round($averageRating, 1);

    return $averageRating;
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