<?php
require_once("connection.php");

function getLocations(){
    global $connect;

    $sql = "SELECT * FROM Country ORDER BY Country_Name ASC";

    $stmt = $connect->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}
?>