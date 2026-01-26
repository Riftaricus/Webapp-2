<?php
require_once("assets/php/functions/session.php");
require("assets/php/functions/flights.php");
require("assets/php/functions/user.php");

if (!isset($_SESSION['isAdmin']) and $_SESSION['isAdmin'] != true || !isUserAdmin($_SESSION['username'])) {
    header("location: index.php");
}

$flights = getFlights();

$accounts = getAccounts();

if (count(getFlights()) == 0) {
    generateRandomFlight(27);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main class="gap-100 flex justifycontentcenter flexcolumn">
        <section class="flex justifycontentcenter adminflightsection">
            <div class="backgroundcolorcfdde0 box flex flexrow alignitemscenter justifycontentcenter wrap adminbox">
                <?php
                for ($i = 0; $i < count($flights); $i++) {
                    echo "<div id=" . "adminflightbyid" . $flights[$i]["Flight_Id"] . " class='adminflightlist flex alignitemscenter justifycontentcenter flexcolumn'>";
                    $from = $flights[$i]["From_Country_Id"];
                    $to = $flights[$i]["To_Country_Id"];

                    if (!is_array($from)) {
                        $from = [$from];
                    }

                    if (!is_array($to)) {
                        $to = [$to];
                    }

                    echo "<h2>"
                        . getCountryNameFromId($from[0])
                        . "<br>"
                        . " ↓ "
                        . "<br>"
                        . getCountryNameFromId($to[0])
                        . "</h2>";
                    echo "<h2>Cost: " . $flights[$i]["Flight_Cost"] . "$</h2>";
                    echo "<h2>Duration: " . $flights[$i]["Flight_Duration"] . " Hours</h2>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>

        <section class="adminflightsettingcontainer flex justifycontentcenter alignitemscenter">
            <div
                class="adminflightsettings backgroundcolorCFDDE0 flex flexcolumn justifycontentcenter alignitemscenter">
                <div class="settingclosemenu flex alignitemsflexend">
                    <div class="flex window-option-close justifycontentcenter alignitemscenter"><img
                            class="window-option-img" src="assets/img/Close.svg" alt="Close"></div>
                </div>

                <div class="flightoptioninfosection">
                    <div class="flex flexcolumn flightsettinginfo justifycontentcenter aligncontentscenter"></div>

                    <form action="./assets/php/forms/flightSettingsForm.php" method="post" id="flightSettingsForm" class="flex flexcolumn">
                        <input type="hidden" name="flightid" id="flightid">
                        <label for="cost">Flight cost:</label>
                        <input type="number" name="flightcost" id="flightcost">
                        <label for="duration">Flight duration:</label>
                        <input type="number" name="flightduration" id="flightduration">
                        <button type="submit" name="save" id="flightoptionsave">Save</button>
                        <button type="submit" name="delete" id="flightoptiondelete">Delete</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="flex justifycontentcenter">
            <div class="backgroundcolorcfdde0 box flex flexrow alignitemscenter justifycontentcenter wrap adminbox">
                <?php
                for ($i = 0; $i < count($accounts); $i++) {
                    echo "<div class='adminlist flex alignitemscenter justifycontentcenter flexcolumn'>";
                    $username = $accounts[$i]["Username"];
                    $creationDate = $accounts[$i]["CreationDate"];

                    $hasAdmin = $accounts[$i]["IsAdmin"] == 1 ? "true" : "False";

                    echo "<h2>" . $username . "</h2>";
                    echo "<h2>Creation Date:" . $creationDate . "</h2>";
                    echo "<h2>Admin: " . $hasAdmin . "</h2>";
                    //echo "<h2>Cost: " . $accounts[$i]["Flight_Cost"] . "$</h2>";
                    //echo "<h2>Duration: " . $accounts[$i]["Flight_Duration"] . " Hours</h2>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>

    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>