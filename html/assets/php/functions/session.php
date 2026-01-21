<?php
session_start();

if (isset($_SESSION["userId"])) {

    $_SESSION["username"] = "none";
    $_SESSION["userId"] = "none";
    $_SESSION["isAdmin"] = false;
}
?>