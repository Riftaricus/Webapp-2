<?php
require_once("../functions/connection.php");
require_once("../functions/bookedFlights.php");

if (!isset($_POST['flight_id'])) {
    die('Invalid request');
}

$flightId = (int) $_POST['flight_id'];

?>

<!DOCTYPE html>
<html>

<head>
    <script>
        function showTransaction() {
            window.location.href = "/flights.php?transaction=<?php echo $flightId ?>";
        }

        // Run on page load
        window.onload = showTransaction;
    </script>
</head>

<body>
</body>

</html>