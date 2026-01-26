<?php
session_start();

if (!isset($_SESSION["userId"])) {
    $_SESSION["username"] = null;
    $_SESSION["userId"] = null;
    $_SESSION["isAdmin"] = false;
}
?>