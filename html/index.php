<?php
session_start();

$_SESSION["username"];
$_SESSION["userId"];
$_SESSION["isAdmin"] = false;

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

function getRandomCountry()
{
    $result = getRandomCountrySQL();

    return $result[0]['Country_Name'];
}

function getRandomCountrySQL()
{
    global $connect;
    $min = 0;
    $max = 9;
    $random = rand($min, $max);
    $sql = "SELECT * FROM Country WHERE Country_Id = :random";
    $stmt = $connect->prepare($sql);
    $stmt->execute([':random' => $random]);
    $result = $stmt->fetchAll();
    return $result;
}

function breakLine()
{
    echo "<br>";
}

function getAverageRating()
{
    $result = getAverageRatingSQL();

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

function getAverageRatingSQL()
{
    global $connect;
    $sql = "SELECT Rating FROM Review";

    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function login($username, $password)
{
    try {
        $result = runLoginSQL($username, $password);

        if (sizeof($result) == 0) {
            return false;
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $result[0]['UserId'];
            $_SESSION['isAdmin'] = (bool)$result[0]['IsAdmin'];
            return true;
        }
    } catch (Exception) {
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

function runLoginSQL($username, $password)
{
    global $connect;
    $sql = 'SELECT * FROM Account_Data WHERE Username = :username AND Password = :password';
    $stmt = $connect->prepare($sql);
    $stmt->execute([':username' => $username, ':password' => $password]);
    $result = $stmt->fetchAll();
    return $result;
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