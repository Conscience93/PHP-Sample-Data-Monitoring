<?php
/*    Sign Up    */
function emptyInputSignup($username, $email, $password, $confirmPassword) {
    $result = "";
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) ) {  //check error first
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username) {
    $result = "";
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {   //check no special characters
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $confirmPassword) {
    $result = "";
    if ($password !== $confirmPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailExists($connection, $email) {
    $sql = "SELECT * FROM users WHERE userEmail = ?;";  // ? is the placeholder
    $statement = mysqli_stmt_init($connection);  // creating a prepared statement to prevent injection?
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../signup.php?error=statementFailed");
        exit();
    }

    // "s" means single string which is $email
    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)) {  // fecthing associated array
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($statement);
}

function createUser($connection, $username, $email, $password) {
    $sql = "INSERT INTO users (userName, userEmail, userPassword) VALUES (?, ?, ?);";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../signup.php?error=statementFailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Note: Any errors in this code would not be announced by database for some reason
    mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../signup.php?error=none");
    exit();
}

/*     Login    */
function emptyInputLogin($email, $password) {
    $result = "";
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($connection, $email, $password) {
    $emailExists = emailExists($connection, $email);

    if ($emailExists === false) {
        header("location: ../login.php?error=invalidlogin");
        exit();
    }

    $obtainPasswordHashed = $emailExists["userPassword"];
    $checkPassword = password_verify($password, $obtainPasswordHashed);

    if ($checkPassword === false) {
        header("location: ../login.php?error=invalidlogin");
        exit();
    } else
    if ($checkPassword === true) {
        // Create session for a user
        session_start();
        $_SESSION["userid"] = $emailExists["userId"];
        $_SESSION["username"] = $emailExists["userName"];
        header("location: ../index.php");
        exit();
    }
}
?>