<?php
$database = "mysql_db";
$databaseName = "Flights";
$username = "VolareWebsite";
$password = "root";

$charset = "utf8mb4";

$dsn = "mysql:host=$database;dbname=$databaseName;charset=$charset";

try {
    $connect = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    // do something
}
?>