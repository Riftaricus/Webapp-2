<?php
include("assets/php/menu.php");
?>

<header class="site-header">
    <div class="big-header">
        <div class="header-container flex justifycontentspacebetween alignitemscenter">
            <a href="/index.php" class="header-logo">
                <h1>Volare Airways</h1>
            </a>

            <nav class="header-nav">
                <ul class="flex flexrow">
                    <li><a href="/about.php">About</a></li>
                    <li><a href="/locations.php">Locations</a></li>
                    <li><a href="/flights.php">Flights</a></li>
                    <li><a href="/reviews.php">Reviews</a></li>
                    <li><a href="/contact.php">Contact</a></li>
                </ul>
            </nav>

            <div class="header-actions flex flexrow alignitemscenter gap-25">
                <form class="search-wrapper" method="post" action="assets/php/forms/search.php">
                    <select id="searchbar" name="searchbar" class="header-search"
                        placeholder="Search Flights...">
                        <?php 
                        $set = [];
                        foreach (getFlights() as $flight) {
                            $set[] = getCountryNameFromId($flight["To_Country_Id"]);
                            $set[] = getCountryNameFromId($flight["From_Country_Id"]);
                        }

                        $set = array_unique($set);

                        foreach ($set as $country) {
                            echo "<option>" . $country . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Search</button>
                </form>
                <button type="button" id="account-menu-toggle" class="header-account-btn">
                    <img class="user-icon" src="assets/img/account_icon.png" alt="Account">
                </button>
            </div>
        </div>
    </div>

    <div class="small-header">
        <div class="header-container flex justifycontentspacebetween alignitemscenter">
            <a href="/index.php" class="header-logo">
                <h1>Volare Airways</h1>
            </a>

            <button type="button" id="header-menu-toggle" class="header-menu-btn">
                <img class="menu-icon" src="assets/img/menu.svg" alt="menu">
            </button>

            <div style="display: none;">
                <nav class="header-nav">
                    <ul class="flex flexrow">
                        <li><a href="/about.php">About</a></li>
                        <li><a href="/locations.php">Locations</a></li>
                        <li><a href="/flights.php">Flights</a></li>
                        <li><a href="/reviews.php">Reviews</a></li>
                        <li><a href="/contact.php">Contact</a></li>
                    </ul>
                </nav>

                <div class="header-actions flex flexrow alignitemscenter gap-25">
                    <form class="search-wrapper" method="post" action="assets/php/forms/search.php">
                        <select id="searchbar" name="searchbar" class="header-search"
                            placeholder="Search Flights...">
                            <?php 
                            $set = [];
                            foreach (getFlights() as $flight) {
                                $set[] = getCountryNameFromId($flight["To_Country_Id"]);
                                $set[] = getCountryNameFromId($flight["From_Country_Id"]);
                            }

                            $set = array_unique($set);

                            foreach ($set as $country) {
                                echo "<option>" . $country . "</option>";
                            }
                            ?>
                        </select>
                        <button type="submit">Search</button>
                    </form>
                    <button type="button" id="account-menu-toggle" class="header-account-btn">
                        <img class="user-icon" src="assets/img/account_icon.png" alt="Account">
                    </button>
                </div>
            </div>
        </div>        
    </div>
</header>