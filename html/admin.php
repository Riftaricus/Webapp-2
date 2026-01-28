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
    generateRandomFlight(amount: 42);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main class="gap-25 flex justifycontentcenter flexcolumn">
        <section class="flex justifycontentcenter admincreateflightsection">
            <div class="flex justifycontentcenter aligncontentscenter createflightcontainer">
                <form action="./assets/php/forms/createflightform.php" method="post" id="createflightform" class="flex flexcolumn">
                    <label for="createflightfrom">From:</label>
                    <select name="from" id="createflightfrom">
                        <?php
                            $countries = getCountries();
                            foreach ($countries as $country) {
                                echo("<option value=" . $country['Country_Id'] . ">" . $country['Country_Name'] . "</option>");
                            }
                        ?>
                    </select>

                    <label for="createflightto">To:</label>
                    <select name="to" id="createflightto">
                        <?php
                            $countries = getCountries();
                            foreach ($countries as $country) {
                                echo("<option value=" . $country['Country_Id'] . ">" . $country['Country_Name'] . "</option>");
                            }
                        ?>
                    </select>

                    <label for="cost">Flight cost:</label>
                    <input type="number" min="-1" max="1000000" name="flightcost" id="createflightcost">

                    <label for="duration">Flight duration:</label>
                    <input type="number" min="-1" max="1000000" name="flightduration" id="createflightduration">

                    <button type="submit" name="save" id="createflight">Create</button>
                </form>
            </div>
        </section>

        <section class="flex justifycontentcenter adminflightsection">
            <div class="backgroundcolorcfdde0 box flex flexrow alignitemscenter justifycontentcenter wrap adminboxflight">
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
            <div class="adminflightsettings backgroundcolorCFDDE0 flex flexcolumn justifycontentcenter alignitemscenter">
                <div class="settingclosemenu flex alignitemsflexend">
                    <div class="flex window-option-close justifycontentcenter alignitemscenter">
                        <img class="window-option-img" src="assets/img/Close.svg" alt="Close">
                        <div class="closehitbox"></div>
                    </div>
                </div>

                <div class="flightoptioninfosection">
                    <div class="flex flexcolumn flightsettinginfo justifycontentcenter aligncontentscenter"></div>

                    <form action="./assets/php/forms/flightSettingsForm.php" method="post" id="flightSettingsForm" class="flex flexcolumn">
                        <input type="hidden" name="flightid" id="flightid">

                        <label for="cost">Flight cost:</label>
                        <input type="number" min="-1" max="1000000" name="flightcost" id="flightcost">

                        <label for="duration">Flight duration:</label>
                        <input type="number" min="-1" max="1000000" name="flightduration" id="flightduration">

                        <button type="submit" name="save" id="flightoptionsave">Save</button>

                        <button type="submit" name="delete" id="flightoptiondelete">Delete</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="flex justifycontentcenter admincreateflightsection">
            <div class="flex justifycontentcenter aligncontentscenter createflightcontainer">
                <form action="./assets/php/forms/createuserform.php" method="post" id="createaccountform" class="flex flexcolumn">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="createausername">

                    <label for="password">Password: </label>
                    <input type="text" name="password" id="createpassword">

                    <label for="language">Language: </label>
                    <select name="language" id="createuserlanguage">
                        <option value="EN">English</option>
                        <option value="NL">Dutch (not fully supported)</option>
                    </select>

                    <label for="isadmin">Is admin: </label>
                    <div class="flex flexrow flexstart">  
                        <input type="radio" id="createisnotadmin" name="isadmin" value="isnotadmin">
                        <label for="isnotadmin">False</label><br>
                        <input type="radio" id="createisadmin" name="isadmin" value="isadmin">
                        <label for="isadmin">True</label><br>
                    </div>

                    <button type="submit" name="save" id="createuser">Create</button>
                </form>
            </div>
        </section>

        <section class="flex justifycontentcenter">
            <div class="backgroundcolorcfdde0 box flex flexrow alignitemscenter justifycontentcenter wrap adminboxuser">
                <?php
                for ($i = 0; $i < count($accounts); $i++) {
                    $userId = $accounts[$i]["UserId"];
                    $username = $accounts[$i]["Username"];
                    $creationDate = $accounts[$i]["CreationDate"];

                    $hasAdmin = $accounts[$i]["IsAdmin"] == 1 ? "true" : "False";

                    echo "<div id='adminuserbyid" . $userId . "' class='adminuserlist flex alignitemscenter justifycontentcenter flexcolumn'>";
                    echo "<h2>" . $username . "</h2>";
                    echo "<h2>Creation Date:<br>" . $creationDate . "</h2>";
                    echo "<h2>Admin: " . $hasAdmin . "</h2>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>

        <section class="adminusersettingcontainer gap-25 flex justifycontentcenter alignitemscenter">
            <div class="adminusersettings backgroundcolorCFDDE0 flex flexcolumn justifycontentcenter alignitemscenter">
                <div class="settingclosemenu flex alignitemsflexend">
                    <div class="flex window-option-close justifycontentcenter alignitemscenter">
                        <img class="window-option-img" src="assets/img/Close.svg" alt="Close">
                        <div class="closehitbox"></div>
                    </div>
                </div>

                <div class="useroptioninfosection">
                    <div class="flex flexcolumn usersettinginfo justifycontentcenter aligncontentscenter"></div>

                    <form action="./assets/php/forms/userSettingsForm.php" method="post" id="userSettingsForm" class="flex flexcolumn">
                        <input type="hidden" name="userid" id="userid">

                        <label for="username">Username: </label>
                        <input type="text" name="username" id="username">

                        <label for="language">Language: </label>
                        <select name="language" id="userlanguage">
                            <option value="EN">English</option>
                            <option value="NL">Dutch (not fully supported)</option>
                        </select>

                        <label for="isadmin">Is admin: </label>
                        <div class="flex flexrow flexstart">  
                            <input type="radio" id="isnotadmin" name="isadmin" value="isnotadmin">
                            <label for="isnotadmin">False</label><br>
                            <input type="radio" id="isadmin" name="isadmin" value="isadmin">
                            <label for="isadmin">True</label><br>
                        </div>

                        <button type="submit" name="save" id="useroptionsave">Save</button>

                        <button type="submit" name="delete" id="useroptiondelete">Delete</button>
                    </form>
                </div>
                <div class="bookedflightsbuttoncontainer flexend">
                    <button class="bookedflightsbutton">
                        Show Booked Flights
                    </button>
                </div>
            </div>

            <div class="bookedflightscontainer" style="display: none;">
                <div class="bookedflightsheader flex justifycontentspacebetween alignitemscenter">
                    <h2>Booked Flights</h2>
                    <div class="settingclosemenu flex alignitemsflexend">
                        <div class="flex window-option-close justifycontentcenter alignitemscenter">
                            <img class="window-option-img" src="assets/img/Close.svg" alt="Close">
                            <div class="closehitbox"></div>
                        </div>
                    </div>
                </div>
                <div class="bookedflightslist flex flexcolumn gap-10"></div>
            </div>
        </section>

    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>