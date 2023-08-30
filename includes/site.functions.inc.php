<?php
/*    Backup Page     */
function invalidUrl($siteUrl) {
    $result = "";
    if (!filter_var($siteUrl, FILTER_VALIDATE_URL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function siteUrlExists($connection, $siteUrl) {
    $sql = "SELECT * FROM sites WHERE siteUrl = ?;";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../backup.php?error=statementFailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "s", $siteUrl);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($statement);
}
function createSite($connection, $siteName, $siteUrl) {
    $sql = "INSERT INTO sites (siteName, siteUrl, siteBackupTime) VALUES (?, ?, ?);";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../backup.php?error=statementFailed");
        exit();
    }

    $backupTime = date('Y-m-d H:i:s');

    mysqli_stmt_bind_param($statement, "sss", $siteName, $siteUrl, $backupTime);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../backup.php?error=none");
    exit();
}

/*    Manage Page     */
function updateSite($connection, $siteUrl) {
    // $siteName = $_POST["siteName"];
    // $siteUrl = $_POST["siteUrl"];

    $sql = "UPDATE sites SET siteBackupTime = ? WHERE siteUrl = ?";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../manage.php?info=statementFailed");
        exit();
    }

    $backupTime = date('Y-m-d H:i:s');

    mysqli_stmt_bind_param($statement, "ss", $backupTime, $siteUrl);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../manage.php?info=backupUpdate");
    exit();
}
function deleteSite($connection, $siteUrl) {
    $sql = "DELETE FROM sites WHERE siteUrl = ?;";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../manage.php?info=statementFailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "s", $siteUrl);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../manage.php?info=backupDelete");
    exit();
}
?>