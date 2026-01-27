<?php require_once("assets/php/functions/session.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main>
        <form action="" method="post">
            <div class="flex alignitemscenter">
                <input type="email" name="email" id="contactemail" placeholder="Enter your email here...">
            </div>
            <label for="message" id="contactmessagecounter">0/1000</label>
            <textarea name="message" id="contactmessage" maxlength="1000" oninput="updateCounter()"></textarea>

            <button type="submit">Submit message</button>
        </form>

    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>