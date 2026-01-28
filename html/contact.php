<?php require_once("assets/php/functions/session.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main class="flex flexcolumn alignitemscenter" style="padding: 2rem;">
        <div class="contactbox">
            <h1>Email: Volare@vola.com</h1>
            <h1>Phone: +1 505-646-7257</h1>
        </div>
        <form action="./assets/php/forms/contact.php" method="post" class="flex alignitemscenter justifycontentcenter flexcolumn contactform">
            <h1>Contact Us</h1>
            <div class="form-group" style="width: 100%;">
                <label for="contactemail">Your Email</label>
                <input type="email" name="email" id="contactemail" placeholder="Enter your email address..." required>
            </div>
            <div class="form-group" style="width: 100%;">
                <label for="contactmessage">Your Message <span id="contactmessagecounter" style="float: right;">0/1000</span></label>
                <textarea name="message" id="contactmessage" maxlength="1000" oninput="updateCounter()" required placeholder="Write your message here..."></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>