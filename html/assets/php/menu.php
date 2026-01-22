<?php require("assets/php/functions/user.php") ?>
<section class="menu-section justifycontentflexend flex">
    <div class="menu flex directioncolumn">
        <div class="menu-login">
            <a href="/login.php">Login</a>
            <div class="menu-login-menu"></div>
        </div>
        <div class="menu-sign-up">
            <a>Sign-Up</a>
            <div class="menu-sign-up-menu"></div>
        </div>
        <div class="menu-settings">
            <a>Settings</a>
            <div class="menu-settings-menu"></div>
        </div>
        <?php


        login("admin", "admin");
        if (isset($_SESSION['isAdmin']) and $_SESSION['isAdmin'] === true)
            echo "<div href=\"admin.php\"><a>Admin</a></div>";
        ?>
    </div>
</section>