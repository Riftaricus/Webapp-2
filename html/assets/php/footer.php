<footer class="site-footer">
    <div class="footer-container flex justifycontentspacebetween">
        <div class="footer-section">
            <h3>Volare</h3>
            <p>Your trusted flight booking partner. Fly with confidence, travel with ease.</p>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="/flights.php">Flights</a></li>
                <li><a href="/about.php">About Us</a></li>
                <li><a href="/reviews.php">Reviews</a></li>
                <li><a href="/contact.php">Contact</a></li>
                <?php
                if (isset($_SESSION['isAdmin']) and $_SESSION['isAdmin'] === true and isUserAdmin($_SESSION['username']))
                    echo "<li><a href='/admin.php'>Admin</a></li>";
                ?>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Contact Us</h3>
            <ul>
                <li><a href="mailto:Volare@vola.com">Email: Volare@vola.com</a></li>
                <li><a href="tel:+15056467257">Tel: +1 505-646-7257</a></li>
                <li><a href="/contact.php">Send a Message</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Legal</h3>
            <ul>
                <li><a href="/legal.php#pp">Privacy Policy</a></li>
                <li><a href="/legal.php#tos">Terms of Service</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom flex justifycontentcenter">
        <p>&copy; <?php echo date("Y"); ?> Volare. All rights reserved.</p>
    </div>
</footer>