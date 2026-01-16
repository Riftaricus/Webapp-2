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
}

class Database
{
    public function getConnection(){
        global $connect;
        return $connect;
    }

    private static $instance = null;
    private function __construct()
    {
    }
    private function __clone()
    {
    }
    private function __wakeup()
    {
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
?>