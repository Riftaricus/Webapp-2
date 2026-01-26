<?php
require_once("../functions/connection.php");
require_once("../functions/bookedFlights.php");

if (!isset($_POST['flight_id'])) {
    die('Invalid request');
}

$flightId = (int) $_POST['flight_id'];

// Perform booking
bookFlight($flightId);
?>

<!DOCTYPE html>
<html>

<head>
    <script>
        function showTransaction() {
            alert("Booked flight!")
            // Redirect after showing the message
            window.location.href = "/flights.php";
        }

        // Run on page load
        window.onload = showTransaction;
    </script>
</head>

<body>
</body>

</html>