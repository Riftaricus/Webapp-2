<section>
    <div>
        <div>Login</div>
        <div>Sign-Up</div>
        <div>
            Settings
            <div></div>
        </div>
        <?php if ($_SESSION["isAdmin"] === true) echo "<div href=\"admin.php\">Admin</div>";?>
    </div>
</section>