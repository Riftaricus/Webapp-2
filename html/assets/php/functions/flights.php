<?php

require("connection.php");


function getRandomCountry()
{
    $result = getRandomCountrySQL();

    return $result[0]['Country_Name'];
}

function getRandomCountrySQL()
{
    global $connect;
    $min = 0;
    $max = 9;
    $random = rand($min, $max);
    $sql = "SELECT * FROM Country WHERE Country_Id = :random";
    $stmt = $connect->prepare($sql);
    $stmt->execute([':random' => $random]);
    $result = $stmt->fetchAll();
    return $result;
}

function getFlights()
{
    global $connect;
    $sql = 'SELECT * FROM Available_Flights';

    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
?>