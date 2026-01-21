<section class="menu-section justifycontentflexend flex">
    <div class="menu flex directioncolumn">
        <div class="menu-login">
            Login
            <div class="menu-login-menu"></div>
        </div>
        <div class="menu-sign-up">
            Sign-Up
            <div class="menu-sign-up-menu"></div>
        </div>
        <div class="menu-settings">
            Settings
            <div class="menu-settings-menu"></div>
        </div>
        <?php if ($_SESSION["isAdmin"] === true) echo "<div href=\"admin.php\">Admin</div>";?>
    </div>
</section>