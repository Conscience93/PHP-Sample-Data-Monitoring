<?php
$serverName = "localhost";
$databaseUsename = "root";
$databasePassword = "";
$databaseName = "monitoring01";

$connection = mysqli_connect($serverName, $databaseUsename, $databasePassword, $databaseName);

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    require_once 'databaseHandler.inc.php';
    require_once 'user.functions.inc.php';

    if (emptyInputSignup($username, $email, $password, $confirmPassword) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($password, $confirmPassword) !== false) {
        header("location: ../signup.php?error=passwordnotmatch");
        exit();
    }
    if (emailExists($connection, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    createUser($connection, $username, $email, $password);

} else {
    header("location: ../signup.php");
    exit();
}

/*
Note: database is created through myphpadmin dashboard
*/
?>