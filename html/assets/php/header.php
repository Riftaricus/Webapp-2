<?php
    include("assets/php/menu.php");
?>

<header class="backgroundcolor399DDB flex justifycontentaround alignitemscenter flexrow">
    <a href="index.php">
        <h1 class="color396ADB">Volare Airways</h1>
    </a>
    <nav class="">
        <ul class="flex flexrow">
            <li><a class="colorcfdde0" href="/about.php">About</a></li>
            <li><a href="/locations.php">Locations</a></li>
            <li><a href="/contact.php">Contact</a></li>
            <li><a href="/flights.php">Flights</a></li>
            <li><a href="/reviews.php">Reviews</a></li>
        </ul>
    </nav>
    <div class="flex flexrow justifycontentcenter alignitemscenter">
        <div>
            <input type="text" id="searchbar" oninput="showHiddenSearch()" class="searchbar flex alignitemscenter"
                placeholder="Search Flights...">
            <div id="searchhidden">
                <div class="searchbox"></div>
                <div class="searchbox"></div>
                <div class="searchbox"></div>
            </div>
        </div>
        <button type="button" id="account-menu-toggle" class="flex justifycontentflexend" style="background: none; border: none; cursor: pointer;"><img class="user-icon" src="assets/img/account_icon.png" alt="account icon"></button>
    </div>
</header>