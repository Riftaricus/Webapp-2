<?php
require __DIR__ . "/index.php";



    $name = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    echoMessage(login($name, $password));
