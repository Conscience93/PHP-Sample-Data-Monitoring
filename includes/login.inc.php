<?php
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'databaseHandler.inc.php';
    require_once 'user.functions.inc.php';

    if (emptyInputLogin($email, $password)) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($connection, $email, $password);

    } else {
        header("location: ../login.php");
        exit();
    }
?>