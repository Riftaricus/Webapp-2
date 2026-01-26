<?php require_once("assets/php/functions/session.php");
require_once("assets/php/functions/ratings.php");
require_once("assets/php/functions/user.php");

login("admin", "admin");
?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main class="flex alignitemscenter flexcolumn gap-100">
        <form action="/assets/php/forms/leaveReview.php" method="post"
            class="flex flexcolumn alignitemscenter reviewform">
            <h1>Leave your review here!</h1>
            <div class="flex row">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo "<img src='assets/img/empty_star.png' class='star' data-state='$i'>";
                }
                ?>
            </div>
            <input type="hidden" name="rating" id="rating" value="0" min="1" max="5">
            <textarea maxlength="100" name="message" id="reviewinput" placeholder="Write a comment here..."></textarea>
            <input type="submit" value="Leave review">
        </form>

        <div class="flex alignitemscenter flexcolumn">
            <h1>Our average rating</h1>
            <div><?php
            $rating = round(getAverageRating());

            $index = 0;

            while ($index != $rating) {
                echo "<img src='assets/img/star.png' class='averagestar'>";
                $index++;
            }
            while ($index != 5) {
                $index++;
                echo "<img src='assets/img/empty_star.png' class='averagestar'>";
            }
            ?>
            </div>
            <h2>We are currently rated <?php echo ($rating) ?> / 5 stars average!</h2>
        </div>

        <div class="flex flexrow alignitemscenter">
            <div class="nextreview flex justifycontentcenter alignitemscenter"><img src="/assets/img/arrowright.png"></div>
            <div class="review"></div>
            <div class="nextreview flex justifycontentcenter alignitemscenter"><img src="/assets/img/arrowleft.png"></div>
        </div>
    </main>
    <?php include './assets/php/footer.php' ?>
</body>

</html>