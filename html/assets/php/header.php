<?php
    include("assets/php/menu.php");
?>

<header class="site-header">
    <div class="header-container flex justifycontentspacebetween alignitemscenter">
        <a href="/index.php" class="header-logo">
            <h1>Volare Airways</h1>
        </a>

        <nav class="header-nav">
            <ul class="flex flexrow">
                <li><a href="/about.php">About</a></li>
                <li><a href="/locations.php">Locations</a></li>
                <li><a href="/contact.php">Contact</a></li>
                <li><a href="/flights.php">Flights</a></li>
                <li><a href="/reviews.php">Reviews</a></li>
            </ul>
        </nav>

        <div class="header-actions flex flexrow alignitemscenter gap-25">
            <div class="search-wrapper">
                <input type="text" id="searchbar" oninput="showHiddenSearch()" class="header-search"
                    placeholder="Search Flights...">
                <div id="searchhidden">
                    <div class="searchbox"></div>
                    <div class="searchbox"></div>
                    <div class="searchbox"></div>
                </div>
            </div>
            <button type="button" id="account-menu-toggle" class="header-account-btn">
                <img class="user-icon" src="assets/img/account_icon.png" alt="Account">
            </button>
        </div>
    </div>
</header>