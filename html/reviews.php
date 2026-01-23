<?php require_once("assets/php/functions/session.php");
require_once("assets/php/functions/ratings.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main class="flex justifycontentcenter">
        <div class="flex flexcolumn alignitemscenter">
            <h1>
                Leave your review here!
            </h1>
            <div class="flex row">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo "<img src='assets/img/empty_star.png' class='star' data-state='$i'>";
                }
                ?>
            </div>
        </div>
    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>