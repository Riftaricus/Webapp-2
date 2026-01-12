<?php
require __DIR__ . "/index.php";



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["name"] ?? "";
    $password = $_POST["password"] ?? "";

    echoMessage(login($name, $password, $connect));
}
