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
    <main class="admin-main flex flexcolumn alignitemscenter">
        <section class="admin-section">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2>Create New Flight</h2>
                </div>
                <form action="./assets/php/forms/createflightform.php" method="post" class="admin-form flex flexcolumn">
                    <div class="form-group">
                        <label for="createflightfrom">From:</label>
                        <select name="from" id="createflightfrom" class="admin-select">
                            <?php
                                $countries = getCountries();
                                foreach ($countries as $country) {
                                    echo("<option value=" . $country['Country_Id'] . ">" . $country['Country_Name'] . "</option>");
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="createflightto">To:</label>
                        <select name="to" id="createflightto" class="admin-select">
                            <?php
                                $countries = getCountries();
                                foreach ($countries as $country) {
                                    echo("<option value=" . $country['Country_Id'] . ">" . $country['Country_Name'] . "</option>");
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="createflightcost">Flight cost:</label>
                        <input type="number" min="0" max="1000000" name="flightcost" id="createflightcost" class="admin-input">
                    </div>

                    <div class="form-group">
                        <label for="createflightduration">Flight duration:</label>
                        <input type="number" min="0" max="1000000" name="flightduration" id="createflightduration" class="admin-input">
                    </div>

                    <button type="submit" name="save" class="admin-btn admin-btn-primary">Create Flight</button>
                </form>
            </div>
        </section>

        <section class="admin-section">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2>Manage Flights</h2>
                </div>
                <div class="admin-grid">
                    <?php
                    for ($i = 0; $i < count($flights); $i++) {
                        $flightId = $flights[$i]["Flight_Id"];
                        $from = $flights[$i]["From_Country_Id"];
                        $to = $flights[$i]["To_Country_Id"];

                        if (!is_array($from)) { $from = [$from]; }
                        if (!is_array($to)) { $to = [$to]; }

                        $fromName = getCountryNameFromId($from[0]);
                        $toName = getCountryNameFromId($to[0]);
                        $cost = $flights[$i]["Flight_Cost"];
                        $duration = $flights[$i]["Flight_Duration"];

                        echo "<div id='adminflightbyid{$flightId}' class='admin-item admin-flight-item'>";
                        echo "<div class='admin-item-header'><strong>{$fromName}</strong> → <strong>{$toName}</strong></div>";
                        echo "<div class='admin-item-details'>";
                        echo "<span>Cost: €{$cost}.00</span>";
                        echo "<span>Duration: {$duration}h</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="admin-modal adminflightsettingcontainer" style="display: none;">
            <div class="admin-modal-content">
                <div class="admin-modal-header flex justifycontentspacebetween alignitemscenter">
                    <h3>Edit Flight</h3>
                    <div class="admin-modal-close">✕</div>
                </div>
                <div class="admin-modal-body">
                    <div class="flightsettinginfo"></div>
                    <form action="./assets/php/forms/flightSettingsForm.php" method="post" id="flightSettingsForm" class="admin-form flex flexcolumn">
                        <input type="hidden" name="flightid" id="flightid">

                        <div class="form-group">
                            <label for="flightcost">Flight cost: </label>
                            <input type="number" min="0" max="1000000" name="flightcost" id="flightcost" class="admin-input">
                        </div>

                        <div class="form-group">
                            <label for="flightduration">Flight duration:</label>
                            <input type="number" min="0" max="1000000" name="flightduration" id="flightduration" class="admin-input">
                        </div>

                        <div class="admin-btn-group">
                            <button type="submit" name="save" class="admin-btn admin-btn-primary">Save Changes</button>
                            <button type="submit" name="delete" class="admin-btn admin-btn-danger">Delete Flight</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="admin-section">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2>Create New User</h2>
                </div>
                <form action="./assets/php/forms/createuserform.php" method="post" class="admin-form flex flexcolumn">
                    <div class="form-group">
                        <label for="createausername">Username:</label>
                        <input type="text" name="username" id="createausername" class="admin-input">
                    </div>

                    <div class="form-group">
                        <label for="createpassword">Password:</label>
                        <input type="password" name="password" id="createpassword" class="admin-input">
                    </div>

                    <div class="form-group">
                        <label for="createuserlanguage">Language:</label>
                        <select name="language" id="createuserlanguage" class="admin-select">
                            <option value="EN">English</option>
                            <option value="NL">Dutch (not fully supported)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Admin privileges:</label>
                        <div class="admin-radio-group flex flexrow gap-25">
                            <label class="admin-radio-label">
                                <input type="radio" name="isadmin" value="isnotadmin" checked> No
                            </label>
                            <label class="admin-radio-label">
                                <input type="radio" name="isadmin" value="isadmin"> Yes
                            </label>
                        </div>
                    </div>

                    <button type="submit" name="save" class="admin-btn admin-btn-primary">Create User</button>
                </form>
            </div>
        </section>

        <section class="admin-section">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2>Manage Users</h2>
                </div>
                <div class="admin-grid">
                    <?php
                    for ($i = 0; $i < count($accounts); $i++) {
                        $userId = $accounts[$i]["UserId"];
                        $username = $accounts[$i]["Username"];
                        $creationDate = $accounts[$i]["CreationDate"];
                        $hasAdmin = $accounts[$i]["IsAdmin"] == 1 ? "Yes" : "No";

                        echo "<div id='adminuserbyid{$userId}' class='admin-item admin-user-item'>";
                        echo "<div class='admin-item-header'><strong>{$username}</strong></div>";
                        echo "<div class='admin-item-details'>";
                        echo "<span>Creation date: {$creationDate}</span>";
                        echo "<span>Admin: {$hasAdmin}</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="admin-modal adminusersettingcontainer" style="display: none;">
            <div class="admin-modal-content">
                <div class="admin-modal-header flex justifycontentspacebetween alignitemscenter">
                    <h3>Edit User</h3>
                    <div class="admin-modal-close">✕</div>
                </div>
                <div class="admin-modal-body">
                    <div class="usersettinginfo"></div>
                    <form action="./assets/php/forms/userSettingsForm.php" method="post" id="userSettingsForm" class="admin-form flex flexcolumn">
                        <input type="hidden" name="userid" id="userid">

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="admin-input">
                        </div>

                        <div class="form-group">
                            <label for="userlanguage">Language:</label>
                            <select name="language" id="userlanguage" class="admin-select">
                                <option value="EN">English</option>
                                <option value="NL">Dutch (not fully supported)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Admin privileges:</label>
                            <div class="admin-radio-group flex flexrow gap-25">
                                <label class="admin-radio-label">
                                    <input type="radio" id="isnotadmin" name="isadmin" value="isnotadmin"> No
                                </label>
                                <label class="admin-radio-label">
                                    <input type="radio" id="isadmin" name="isadmin" value="isadmin"> Yes
                                </label>
                            </div>
                        </div>

                        <div class="admin-btn-group">
                            <button type="submit" name="save" class="admin-btn admin-btn-primary">Save Changes</button>
                            <button type="submit" name="delete" class="admin-btn admin-btn-danger">Delete User</button>
                        </div>
                    </form>
                </div>
                <div class="admin-modal-footer">
                    <button class="bookedflightsbutton admin-btn">Show Booked Flights</button>
                </div>
            </div>

            <div class="bookedflightscontainer admin-modal-content" style="display: none;">
                <div class="admin-modal-header flex justifycontentspacebetween alignitemscenter">
                    <h3>Booked Flights</h3>
                    <div class="admin-modal-close booked-close">✕</div>
                </div>
                <div class="bookedflightslist admin-modal-body flex flexcolumn gap-25"></div>
            </div>
        </section>

    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>