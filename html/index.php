<?php
session_start();

$_SESSION["username"] = "Null";
$_SESSION["userid"] = "Null";
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
    echo "Connection succesfully made!";
} catch (PDOException $e) {
    echo "" . $e->getMessage() . "";
}
breakLine();

echo(getRandomCountry($connect));

login("root", "root", $connect);

breakLine();

echo (getAverageRating($connect));

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
            if ($row['Password'] == $password) {
                $_SESSION['username'] = $row['Username'];
                $_SESSION['userid'] = $row['UserId'];
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

function runSQL(string $sql, PDO $connection)
{
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}


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
    </main>
    <footer>

    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>