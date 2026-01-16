<?php
session_start();

$_SESSION["username"] = "none";
$_SESSION["userId"] = "none";
$_SESSION["isAdmin"] = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/img/icon/logo.png">
    <title>Volare Airways</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include './assets/php/header.php' ?>
    <main>
        <div class="indexbox backgroundcolorcfdde0 flex justifyselfcenter justifycontentcenter alignitemscenter">
            <h1 class="herotext">We bring you to your dreams</h1>
        </div>

        <a href="admin.php">Go to Admin</a>


    </main>
    <?php include './assets/php/footer.php' ?>
    <script src="assets/js/script.js"></script>
</body>

</html>