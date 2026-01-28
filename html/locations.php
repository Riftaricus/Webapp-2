<?php require_once("assets/php/functions/session.php");
require_once("assets/php/functions/locations.php");
?>


<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main class="flex gap-100 flexcolumn alignitemscenter">
        <?php

        $i = 1;

        $locations = getLocations();


        foreach ($locations as $location) {
            if ($i == 1) {
                $i = 0;
                echo (
                    '        <div class="leftflightbox flex flexrow">
    <div class="leftflightboxmain">
        <h1>' . $location["Country_Name"] . '</h1>
    </div>
    <div class="leftflightboxsecondary flex flexcolumn">
                <h2>' . $location["Country_Description"] . '
                </h2>
    </div>
</div>');
            } else if ($i == 0) {
                $i = 1;
                echo ('        <div class="rightflightbox flex flexrow">
            <div class="rightflightboxsecondary flex flexcolumn">
                <h2>' . $location["Country_Description"] . '
                </h2>
            </div>
            <div class="rightflightboxmain">
                <h1>' . $location["Country_Name"] . '</h1>
            </div>
        </div>');
            }
        }

        ?>
    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>