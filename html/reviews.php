<?php
require_once("assets/php/functions/session.php");
require_once("assets/php/functions/ratings.php");
require_once("assets/php/functions/user.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include './assets/php/head.php' ?>

<body>
    <?php include './assets/php/header.php' ?>
    <main class="flex alignitemscenter flexcolumn gap-25">
        <form action="/assets/php/forms/leaveReview.php" method="post"
            class="flex flexcolumn alignitemscenter reviewform">
            <h1>Leave your review here!</h1>
            <div class="flex flexrow gap-25" id="star-container">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo "<img src='assets/img/empty_star.png' class='star' data-index='$i' style='cursor: pointer;' alt='full star'>";
                }
                ?>
            </div>
            <input type="hidden" name="rating" id="rating" value="">
            <textarea maxlength="197" name="message" id="reviewinput" placeholder="Write your review here..."
                required></textarea>
            <input type="submit" value="Submit Review">
        </form>

        <?php
        $ratings = getRatings();
        $total = count($ratings);

        echo "<script>var total = " . $total . "</script>";

        if ($total > 0):
            $number = isset($_GET['comment']) ? (int) $_GET['comment'] : 0;

            // Wrap around
            if ($number < 0) {
                $number = $total - 1;
            }

            if ($number >= $total) {
                $number = 0;
            }

            $rating = (int) $ratings[$number]['Rating'];
            $message = $ratings[$number]['Message'];
            ?>

            <div class="flex flexrow alignitemscenter" id="review">
                <div class="nextreview flex justifycontentcenter alignitemscenter" onclick="changeReview(-1)"
                    style="cursor: pointer;">
                    <img src="assets/img/arrowright.png" alt="Next">
                </div>
                <div class="review flex justifycontentcenter alignitemscenter flexcolumn">
                    <div>
                        <div>
                            <?php
                            for ($i = 0; $i < 5; $i++) {
                                $img = $i < $rating
                                    ? 'assets/img/star.png'
                                    : 'assets/img/empty_star.png';

                                echo "<img src='$img' class='ratingstar' alt='star'>";
                            }
                            ?>
                        </div>
                        <div class="flex justifycontentcenter">
                            <h3 class="reviewtext"><?= htmlspecialchars($message) ?></h3>
                        </div>
                    </div>
                </div>
                <div class="nextreview flex justifycontentcenter alignitemscenter" onclick="changeReview(1)"
                    style="cursor: pointer;">
                    <img src="assets/img/arrowleft.png" alt="Previous">
                </div>
            </div>

        <?php else: ?>
            <div class="flex alignitemscenter flexcolumn">
                <h2>No reviews yet. Be the first to leave one!</h2>
            </div>
        <?php endif; ?>

        <div class="rating-section">
            <h1>Our Average Rating</h1>
            <div>
                <?php
                $rating = round(getAverageRating());

                for ($i = 0; $i < 5; $i++) {
                    if ($i < $rating) {
                        echo "<img src='assets/img/star.png' class='averagestar' alt='full star'>";
                    } else {
                        echo "<img src='assets/img/empty_star.png' class='averagestar' alt='star'>";
                    }
                }
                ?>
            </div>
            <h2>We are currently rated <?php echo $rating ?> / 5 stars average!</h2>
        </div>
    </main>
    <?php include './assets/php/footer.php' ?>

</body>

</html>