<?php require_once("assets/php/functions/session.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main class="flex flexcolumn alignitemscenter">
        <div class="flex alignitemscenter flexcolumn contactbox">
            <h1>Email: Volare@vola.com</h1>
            <h1>Phone Number: +1 505-646-7257</h1>
        </div>
        <form action="./assets/php/forms/contact.php" method="post" class="flex alignitemscenter flexcolumn contactform">
            <h1>Contact us here!</h1>
            <div class="flex alignitemscenter">
                <input type="email" name="email" id="contactemail" placeholder="Enter your email here...">
            </div>
            <label for="message" id="contactmessagecounter">0/1000</label>
            <textarea name="message" id="contactmessage" maxlength="1000" oninput="updateCounter()" required placeholder="Write a message here..."></textarea>

            <button type="submit">Submit message</button>
        </form>

    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>