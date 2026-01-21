<?php

require("connection.php");
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
?>