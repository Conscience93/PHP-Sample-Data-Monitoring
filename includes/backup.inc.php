<?php
$serverName = "localhost";
$databaseUsename = "root";
$databasePassword = "";
$databaseName = "monitoring01";

$connection = mysqli_connect($serverName, $databaseUsename, $databasePassword, $databaseName);

if (isset($_POST["submit"])) {
    $siteName = $_POST["siteName"];
    $siteUrl = $_POST["siteUrl"];

    require_once 'databaseHandler.inc.php';
    require_once 'site.functions.inc.php';

    if (invalidUrl($siteUrl) !== false) {
        header("location: ../backup.php?error=invalidUrl");
        exit();
    }
    if (siteUrlExists($connection, $siteUrl) !== false) {
        header("location: ../backup.php?error=siteUrlExists");
        exit();
    }

    createSite($connection, $siteName, $siteUrl);

} else {
    header("location: ../backup.php");
    exit();
}

/*
Note: database is created through myphpadmin dashboard
*/
?>