<?php

require_once("connection.php");
require_once(__DIR__ . "/session.php");

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

function getAccounts()
{
    global $connect;

    $sql = "SELECT * FROM Account_Data";

    $stmt = $connect->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getNameFromId($id)
{
    global $connect;
    $sql = "SELECT * FROM Account_Data WHERE UserId = :userid";
    $stmt = $connect->prepare($sql);
    $stmt->execute([":userid" => $id]);

    $result = $stmt->fetch();

    return $result["Username"];
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

function isUserAdmin($username)
{
    global $connect;

    $sql = "SELECT * FROM Account_Data WHERE Username = :username";
    $stmt = $connect->prepare($sql);

    try {
        $stmt->execute([':username' => $username]);
        $result = $stmt->fetch();

        if ($result["IsAdmin"] === 1)
            return true;
        else
            return false;
    } catch (Exception $e) {
        return false;
    }
}

function runLoginSQL($username)
{
    global $connect;

    $sql = "SELECT * FROM Account_Data WHERE Username = :username";
    $stmt = $connect->prepare($sql);

    try {

        $stmt->execute([':username' => $username]);

        return $stmt->fetch();
    } catch (Exception $e) {
        return null;
    }
}


function createAccount($username, $password, $language = 'EN', $isAdmin = false)
{
    global $connect;

    $today = date('Y-m-d');
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "
        INSERT INTO Account_Data 
        (Username, Password, CreationDate, Language, IsAdmin)
        VALUES 
        (:username, :hash, :today, :language, :isAdmin)
    ";

    $stmt = $connect->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':hash' => $hash,
        ':today' => $today,
        ':language' => $language,
        ':isAdmin' => $isAdmin ? 1 : 0
    ]);

    return $connect->lastInsertId();
}

function getUserById($id)
{
    global $connect;

    $sql = "SELECT * FROM Account_Data WHERE UserId = :id";
    $stmt = $connect->prepare($sql);
    $stmt->execute([':id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function editUser($id, $username, $language, $isAdmin)
{
    if (!is_numeric($id) || empty($username)) {
        return false;
    }

    global $connect;
    $sql = ($username != null) ? "UPDATE Account_Data SET Username = :username, Language = :language, IsAdmin = :isAdmin WHERE UserId = :id" : "UPDATE Account_Data SET Language = :language, IsAdmin = :isAdmin WHERE UserId = :id";
    $stmt = $connect->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':username' => $username,
        ':language' => $language,
        ':isAdmin' => $isAdmin ? 1 : 0
    ]);
}

function deleteUser($id)
{
    if (!is_numeric($id)) {
        return false;
    }

    global $connect;
    $sql = "DELETE FROM Account_Data WHERE UserId = :id";
    $stmt = $connect->prepare($sql);

    $stmt->execute([':id' => $id]);
    $result = $stmt->fetch();

    return $result;
}

function updateUserPassword($id, $newPassword)
{
    if (!isset($_SESSION['userId'])) {
        return false;
    }

    $id = (int) $id;
    $sessionUserId = (int) $_SESSION['userId'];

    if ($id <= 0 || $id !== $sessionUserId || empty($newPassword)) {
        return false;
    }

    global $connect;
    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
    
    $sql = "UPDATE Account_Data SET Password = :password WHERE UserId = :id";
    $stmt = $connect->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':password' => $hash
    ]);
}
?>