<?php 
require_once("assets/php/functions/user.php");
require_once("assets/php/functions/bookedFlights.php");
require_once("assets/php/functions/flights.php");
?>
<section class="menu-section justifycontentcenter aligncontentcenter flex" style="display: none;" inert>
    <div class="menu-container flex flexrow gap-25">
        <div class="menu flex flexcolumn">
            <?php
            echo (!empty($_SESSION['username']))
                ? "<a class='menu-logout' href='/assets/php/forms/logoutform.php'>Logout</a>"
                : "<div class='menu-login menu-item' data-submenu='login'><a>Login</a></div>";
            
            if (empty($_SESSION['username']))
                echo "<div class='menu-sign-up menu-item' data-submenu='signup'><a>Sign-Up</a></div>";

            if (!empty($_SESSION['username']))
                echo "<div class='menu-settings menu-item' data-submenu='settings'><a>Settings</a></div>";
            
            if (!empty($_SESSION['username']))
                echo "<div class='menu-booked-flights menu-item' data-submenu='booked'><a>Booked flights</a></div>";

            if (isset($_SESSION['isAdmin']) and $_SESSION['isAdmin'] === true and isUserAdmin($_SESSION['username']))
                  echo "<a class='menu-admin' href='/admin.php'>Admin</a>";
            ?>

            <div class="menu-close">
                <a>Close</a>
            </div>
        </div>

        <div class="menu-submenu menu-login-menu flex flexcolumn" data-submenu-id="login">
            <div class="submenu-header flex justifycontentspacebetween alignitemscenter">
                <h3>Login</h3>
                <div class="submenu-back">←</div>
            </div>
            <form action="/assets/php/forms/loginform.php" method="post" class="submenu-form flex flexcolumn">
                <label for="login-username">Username</label>
                <input type="text" name="username" id="login-username" placeholder="Enter username">
                
                <label for="login-password">Password</label>
                <input type="password" name="password" id="login-password" placeholder="Enter password">
                
                <button type="submit" name="login" class="submenu-btn">Login</button>
            </form>
        </div>

        <div class="menu-submenu menu-sign-up-menu flex flexcolumn" data-submenu-id="signup">
            <div class="submenu-header flex justifycontentspacebetween alignitemscenter">
                <h3>Sign Up</h3>
                <div class="submenu-back">←</div>
            </div>
            <form action="/assets/php/forms/signupform.php" method="post" class="submenu-form flex flexcolumn">
                <label for="signup-username">Username</label>
                <input type="text" name="username" id="signup-username" placeholder="Choose username">
                
                <label for="signup-password">Password</label>
                <input type="password" name="password" id="signup-password" placeholder="Choose password">
                
                <label for="signup-confirm">Confirm Password</label>
                <input type="password" name="confirm" id="signup-confirm" placeholder="Confirm password">
                
                <button type="submit" name="signup" class="submenu-btn">Create Account</button>
            </form>
        </div>

        <div class="menu-submenu menu-settings-menu flex flexcolumn" data-submenu-id="settings">
            <div class="submenu-header flex justifycontentspacebetween alignitemscenter">
                <h3>Settings</h3>
                <div class="submenu-back">←</div>
            </div>
            <form action="/assets/php/forms/settingsform.php" method="post" class="submenu-form flex flexcolumn">
                <div class="settings-item flex justifycontentspacebetween alignitemscenter">
                    <label for="settings-change-username">Update username</label>
                    <input type="text" name="username" id="settings-change-username">

                    <label for="settings-password">Change password</label>
                    <input type="password" name="password" id="settings-password">

                    <div class="settings-confirm-password-container" style="display: none;">
                        <label for="settings-current-password">Current password</label>
                        <input type="password" name="current-password" id="settings-current-password">
                    </div>

                    <label for="settings-language">Language</label>
                    <select name="language" id="settings-language">
                        <option value="EN">English</option>
                        <option value="NL">Dutch (Not fully supported)</option>
                    </select>
                </div>
                
                <button type="submit" name="save" class="submenu-btn">Save Settings</button>
            </form>
        </div>

        <div class="menu-submenu menu-booked-menu flex flexcolumn" data-submenu-id="booked">
            <div class="submenu-header flex justifycontentspacebetween alignitemscenter">
                <h3>Booked Flights</h3>
                <div class="submenu-back">←</div>
            </div>
            <div class="submenu-content booked-flights-list flex flexcolumn">
                <?php
                if (!empty($_SESSION['userId'])) {
                    $userBookedFlights = getBookedFlightsById($_SESSION['userId'], true);
                    
                    if (empty($userBookedFlights)) {
                        echo "<p class='no-flights-message'>You have no booked flights.</p>";
                    } else {
                        foreach ($userBookedFlights as $booking) {
                            $fromCountry = getCountryNameFromId($booking['From_Country_Id']);
                            $toCountry = getCountryNameFromId($booking['To_Country_Id']);

                            $flight = getFlights($booking['Flight_Id']);

                            $duration = $flight[0]["Flight_Duration"];
                            
                            echo "<div class='booked-flight-item'>";
                            echo "<h4>{$fromCountry} → {$toCountry}</h4>";
                            echo "<p>Duration: {$duration} Hours</p>";
                            echo "</div>";
                        }
                    }
                } else {
                    echo "<p class='no-flights-message'>Please log in to view your booked flights.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</section>