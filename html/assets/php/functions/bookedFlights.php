<?php
require_once(__DIR__ . "/connection.php");
require_once(__DIR__ . "/flights.php");

function getBookedFlights()
{
    global $connect;

    $sql = "SELECT * FROM Booked_Flights";

    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}

function getBookedFlightsById($id, $isUserId = false)
{
    global $connect;
    $sql = ($isUserId === true) ? "SELECT * FROM Booked_Flights WHERE UserId = :id" : "SELECT * FROM Booked_Flights WHERE Flight_Id = :id";

    $stmt = $connect->prepare($sql);
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetchAll();
    return $result;
}

function removeAllBookedFlightsById($id)
{
    global $connect;
    $sql = 'DELETE FROM Booked_Flights WHERE Flight_Id = :id';
    $stmt = $connect->prepare($sql);
    $stmt->execute([':id' => $id]);
}

function bookFlight($id)
{
    $flights = getFlights($id);

    if (!isset($flights)) {
        return false;
    }

    global $connect;
    $sql = 'INSERT INTO Booked_Flights (Flight_Id, Flight_Duration, From_Country_Id, To_Country_Id, UserId)
    VALUES (:Flight_Id, :Flight_Duration, :From_Country_Id, :To_Country_Id, :UserId)';

    $stmt = $connect->prepare($sql);
    $stmt->execute([
        ':Flight_Id' => $flights[0]['Flight_Id'],
        ':Flight_Duration' => $flights[0]['Flight_Duration'],
        ':From_Country_Id' => $flights[0]['From_Country_Id'],
        ':To_Country_Id' => $flights[0]['To_Country_Id'],
        ':UserId' => $_SESSION['userId']
    ]);
}

?>