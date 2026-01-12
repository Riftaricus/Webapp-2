<?php
session_start();

$_SESSION["username"] = "Null";
$_SESSION["userId"] = "Null";
$_SESSION["isAdmin"] = false;

?>


<?php
$database = "mysql_db";
$databaseName = "Flights";
$username = "VolareWebsite";
$password = "root";

$charset = "utf8mb4";

$dsn = "mysql:host=$database;dbname=$databaseName;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $connect = new PDO($dsn, $username, $password, $opt);
} catch (PDOException $e) {
    echo "" . $e->getMessage() . "";
}


login("root", "root", $connect);

function getRandomCountry($connection)
{
    $min = 0;
    $max = 9;

    $random = rand($min, $max);
    $sql = "SELECT * FROM Country WHERE Country_Id = $random";
    $result = runSQL($sql, $connection);

    return $result[0]['Country_Name'];
}

function breakLine()
{
    echo "<br>";
}

function getAverageRating($connection)
{
    $sql = "SELECT Rating FROM Review";

    $result = runSQL($sql, $connection);

    $averageRating = 0;

    $totalRating = 0;

    $amountOfReviews = 0;

    foreach ($result as $row) {
        $totalRating += $row['Rating'];

        $amountOfReviews++;
    }

    $averageRating = $totalRating / $amountOfReviews;

    $averageRating = round($averageRating, 1);

    return $averageRating;
}



function login($username, $password, $connection)
{
    try {
        $sql = 'SELECT * FROM Account_Data';

        $result = runSQL($sql, $connection);

        foreach ($result as $row) {
            if ($row['Password'] == $password && strtolower($row['Username']) == strtolower($username)) {
                session_reset();
                $_SESSION['username'] = $row['Username'];
                $_SESSION['userId'] = $row['UserId'];
                if ($row['IsAdmin'] == true) {
                    $_SESSION['isAdmin'] = true;
                } else {
                    $_SESSION['isAdmin'] = false;
                }
                return true;
            }
        }
        return false;
    } catch (Exception $e) {
        return false;
    }
}

function logout($connection)
{
    try {
        session_regenerate_id(true);
        session_unset();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function runSQL(string $sql, PDO $connection)
{
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function echoMessage($message)
{
    echo "" . $message . "";
}


echo $_SESSION["username"] . "";
echo $_SESSION["userId"] . "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volare Airways</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <header class="backgroundcolor399DDB flex justifycontentaround flexcolumn">
        <h1>Volare Airways</h1>
        <nav class="flex justifycontentcenter alignitemscenter">
            <ul class="flex flexrow ">
                <li><a>About</a></li>
                <li><a>Locations</a></li>
                <li><a>Contact</a></li>
                <li><a>Flights</a></li>
                <li><a>Reviews</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="post" action="/login.php">
            <input type="text" id="username" name="username" value="">
            <input type="text" id="password" name="password">
            <input type="submit" value="Submit">
        </form>
    </main>
    <footer>

    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>