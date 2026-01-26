<?php
require_once("./connection.php");
require_once("./flights.php");

function getBookedFlights()
{
    global $connect;

    $sql = "SELECT * FROM Booked_Flights";

    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}

function getBookedFlight($id)
{
    global $connect;
    $sql = "SELECT * FROM Booked_Flights WHERE id = :id";

    $stmt = $connect->prepare($sql);
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetchAll();
    return $result;
}

function removeAllBookedFlightsById($id)
{
    global $connect;
    $sql = 'DELETE FROM Booked_Flights WHERE id = :id';
    $stmt = $connect->prepare($sql);
    $stmt->execute([':id' => $id]);
}

function bookFlight($id)
{
    $flight = getFlights($id);









    global $connect;
    $sql = 'INSERT INTO Booked_Flights (Flight_Id, Flight_Duration, From_Country_Id, To_Country_Id, UserId)
    VALUES (:Flight_Id, :Flight_Duration, :From_Country_Id, :To_Country_Id, :UserId)';

    $stmt = $connect->prepare($sql);
    $stmt->execute([
        ':Flight_Id' => $flight['Flight_Id'],
        ':Flight_Duration' => $flight['Flight_Duration'],
        ':From_Country_Id' => $flight['From_Country_Id'],
        ':To_Country_Id' => $flight['To_Country_Id'],
        ':UserId' => $_SESSION['UserId']
    ]);
}

?>