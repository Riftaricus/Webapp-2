<?php
require_once("assets/php/functions/session.php");
require_once("assets/php/functions/user.php");


login("test", "test");

// logout();

?>


<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main>

        <div class="indexbox backgroundcolorcfdde0 flex justifyselfcenter justifycontentcenter alignitemscenter">
            <h1 class="herotext">We bring you to your dreams</h1>
        </div>

        <a href="admin.php">Go to Admin</a>


    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>