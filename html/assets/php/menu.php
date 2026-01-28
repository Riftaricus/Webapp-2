<?php require_once("assets/php/functions/user.php") ?>
<section class="menu-section justifycontentcenter aligncontentcenter flex" style="display: none;" inert>
    <div class="menu-container flex flexrow gap-25">
        <div class="menu flex flexcolumn">
            <?php
                echo (!empty($_SESSION['username']))
                    ? "<a class='menu-logout' href='/assets/php/forms/logoutform.php'>Logout</a>"
                    : "<div class='menu-login menu-item' data-submenu='login'><a>Login</a></div>";
            ?>
            
            <?php
            if (empty($_SESSION['username']))
                echo "<div class='menu-sign-up menu-item' data-submenu='signup'><a>Sign-Up</a></div>";
            ?>

            <div class="menu-settings menu-item" data-submenu="settings">
                <a>Settings</a>
            </div>

            <?php
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
            <div class="submenu-content flex flexcolumn">
                <div class="settings-item flex justifycontentspacebetween alignitemscenter">
                    <label for="settings-language">Language</label>
                    <select name="language" id="settings-language">
                        <option value="EN">English</option>
                        <option value="NL">Dutch</option>
                    </select>
                </div>
                
                <div class="settings-item flex justifycontentspacebetween alignitemscenter">
                    <label for="settings-theme">Theme</label>
                    <select name="theme" id="settings-theme">
                        <option value="light">Light</option>
                        <option value="dark">Dark</option>
                    </select>
                </div>
                
                <button type="button" class="submenu-btn settings-save">Save Settings</button>
            </div>
        </div>
    </div>
</section>