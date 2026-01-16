<?php
require __DIR__ . "/index.php";



    $name = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($name == "") {
        logout();
    }

    login($name, $password);
