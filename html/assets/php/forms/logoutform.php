<?php
require_once(__DIR__ . "/../functions/session.php");
require_once(__DIR__ . "/../functions/user.php");

logout();

header("Location: /index.php");
exit;
?>
