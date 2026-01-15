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
    // echo "" . $e->getMessage() . "";
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
        $user = runLoginSQL($username);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['Password'])) {
            return false;
        }

        $_SESSION['username'] = $user['Username'];
        $_SESSION['userId'] = $user['UserId'];
        $_SESSION['isAdmin'] = (bool) $user['IsAdmin'];

        return true;

    } catch (Exception $e) {
        return false;
    }
}


function logout()
{
    try {
        session_unset();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function runLoginSQL($username)
{
    global $connect;

    $sql = "SELECT * FROM Account_Data WHERE Username = :username";
    $stmt = $connect->prepare($sql);
    $stmt->execute([':username' => $username]);

    return $stmt->fetch();
}


function createAccount($username, $password)
{
    global $connect;

    $today = date('Y-m-d');
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "
        INSERT INTO Account_Data 
        (Username, Password, CreationDate, Language, IsAdmin)
        VALUES 
        (:username, :hash, :today, :language, 0)
    ";

    $stmt = $connect->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':hash' => $hash,
        ':today' => $today,
        ':language' => 'EN'
    ]);

    return $connect->lastInsertId();
}



function echoMessage($message)
{
    echo "" . $message . "";
}
$count = 0;

do {
    $count++;
    $fromCountry = getRandomCountry();
    $toCountry = getRandomCountry();
} while ($fromCountry == $toCountry);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/img/icon/logo.png">
    <title>Volare Airways</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <header class="backgroundcolor399DDB flex justifycontentaround alignitemscenter flexrow">
        <h1 class="color396ADB">Volare Airways</h1>
        <nav class="">
            <ul class="flex flexrow">
                <li><a class="colorcfdde0" href="">About</a></li>
                <li><a href="">Locations</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Flights</a></li>
                <li><a href="">Reviews</a></li>
            </ul>
        </nav>
        <div></div>
    </header>

    <main>

    </main>
    <footer>

    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>