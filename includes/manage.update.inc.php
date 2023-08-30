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

    updateSite($connection, $siteUrl);

} else {
    header("location: ../manage.php");
    exit();
}

/*
Note: database is created through myphpadmin dashboard
*/
?>