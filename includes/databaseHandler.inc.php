<?php
$serverName = "localhost";
$databaseUsename = "root";
$databasePassword = "";
$databaseName = "monitoring01";

$connection = mysqli_connect($serverName, $databaseUsename, $databasePassword, $databaseName);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

/*
Note: database is created through myphpadmin dashboard
CREATE TABLE users (
userId INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userName VARCHAR(255) NOT NULL,
userEmail VARCHAR(255) NOT NULL,
userPassword VARCHAR(255) NOT NULL
)

CREATE TABLE sites (
siteId INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
siteName VARCHAR(255) NOT NULL,
siteUrl VARCHAR(255) NOT NULL,
siteBackupTime DATETIME DEFAULT CURRENT_TIMESTAMP()
)
*/
?>