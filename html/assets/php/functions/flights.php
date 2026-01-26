<?php

require_once("connection.php");

function getRandomCountry()
{
    $result = getRandomCountrySQL();

    return $result[0]['Country_Name'];
}

function getRandomCountrySQL()
{
    global $connect;
    $min = 0;
    $max = 39;
    $random = rand($min, $max);
    $sql = "SELECT * FROM Country WHERE Country_Id = :random";
    $stmt = $connect->prepare($sql);
    $stmt->execute([':random' => $random]);
    $result = $stmt->fetchAll();
    return $result;
}

function getCountryNameFromId($id)
{
    global $connect;

    $sql = 'SELECT * FROM Country WHERE Country_Id = :id';

    $stmt = $connect->prepare($sql);

    $stmt->execute([':id' => $id]);

    $result = $stmt->fetchAll();

    $name = $result[0]['Country_Name'];

    return $name;
}

function getCountryIdFromName($name)
{
    global $connect;

    $sql = 'SELECT * FROM Country WHERE Country_Name = :name';

    $stmt = $connect->prepare($sql);

    $stmt->execute([':name' => $name]);

    $result = $stmt->fetchAll();

    $name = $result[0]['Country_Id'];

    return $name;
}

function generateRandomFlight($amount)
{
    for ($i = 0; $i < $amount; $i++) {

        $flight_cost = mt_rand(100, 10000);
        $flight_duration = mt_rand(2, 24);
        do {
            $from_country = getCountryIdFromName(getRandomCountry());
            $to_country = getCountryIdFromName(getRandomCountry());
        } while ($from_country == $to_country);

        createFlight($flight_cost, $flight_duration, $from_country, $to_country);
    }
}

function createFlight($flight_cost, $flight_duration, $fromCountry, $toCountry)
{
    global $connect;
    $sql = 'INSERT INTO Available_Flights (Flight_Id, Flight_Cost, Flight_Duration, From_Country_Id, To_Country_Id)
    VALUES (:flight_id, :flight_cost, :flight_duration, :fromCountry, :toCountry);';

    $flight_id = sizeof(getFlights());

    $stmt = $connect->prepare($sql);
    $stmt->execute([':flight_id' => $flight_id, ':flight_cost' => $flight_cost, ':flight_duration' => $flight_duration, ':fromCountry' => $fromCountry, ':toCountry' => $toCountry]);

}

function getFlights($id = null)
{

    global $connect;

    if ($id !== null) {
        $sql = 'SELECT * FROM Available_Flights WHERE Flight_Id = :id';
        $stmt = $connect->prepare($sql);
        $stmt->execute([':id' => $id]);
    } else {
        $sql = 'SELECT * FROM Available_Flights';
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    }

    $result = $stmt->fetchAll();

    return $result;
}

function editFlight($cost, $duration, $id)
{
    if (!is_numeric($cost) || !is_numeric($duration) || !is_numeric($id)) {
        return;
    }

    global $connect;
    $sql = "
        UPDATE `Available_Flights` 
        SET `Flight_Cost`=:cost,`Flight_Duration`=:duration
        WHERE Flight_Id = :id
    ";

    $stmt = $connect->prepare($sql);
    $stmt->execute([
        ':cost' => $cost,
        ':duration' => $duration,
        ':id' => $id
    ]);

    return $connect->lastInsertId();
}

function deleteFlight($id) {
    if (!is_numeric($id) || !isUserAdmin($_SESSION['username'])) {
        return;
    }

    global $connect;
    $sql = "DELETE FROM `Available_Flights` WHERE Flight_Id = :id";

    $stmt = $connect->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);

    return $connect->lastInsertId();
}
?>