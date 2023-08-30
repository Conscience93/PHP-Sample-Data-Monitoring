<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Page Description">

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        
        <!--     CSS     -->
        <link id="pagestyle" href="css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

        <title>Data Monitor</title>
    </head>
    
    <body class="p-3 mb-2 bg-light text-black">
        <nav>
            <div>
                <a href='index.php'><img src='img/monitor-logo.png' alt='Monitor logo'></a>
                <ul class='nav-ul'>
                    <li class='nav-li'><a href='index.php'>Home</a><li>
                    <li class='nav-li'><a href='about.php'>About Us</a><li>
                    <?php
                        if (isset($_SESSION["userid"])) {
                            echo "<li class='nav-li'><a href='dashboard.php'>Dashboard</a><li>";
                            echo "<li class='nav-li'><a href='manage.php'>Manage Site</a><li>";
                            echo "<li class='nav-li'><a href='backup.php'>Backup</a><li>";
                            echo "<li class='nav-user-li'><a href='profile.php'>Profile</a><li>";
                            echo "<li class='nav-user-li'><a href='includes/logout.inc.php'>Log Out</a><li>";
                        } else {
                            echo "<li class='nav-user-li'><a href='signup.php'>Sign Up</a><li>";
                            echo "<li class='nav-user-li'><a href='login.php'>Log in</a><li>";
                        }
                    ?>
            </div>
        </nav>