<?php
    include_once 'header.php';
    include_once 'includes/databaseHandler.inc.php';
?>
<div class='container justify-content-center w-30 p-3'>
    <h2>Site Management</h2>
</div>
<div class='container justify-content-center w-30 p-3'>
<?php
        if (isset($_GET["info"])) {
            if ($_GET["info"] == "backupDelete") {
                echo "<p class='alert alert-info'>Site backup has been deleted.</p>";
            } else
            if ($_GET["info"] == "backupUpdate") {
                echo "<p class='alert alert-info'>Site backup has been up-to-date!</p>";
            }
        }
?>
</div>
<div class='row mt-1 col-10'>
    <table>
        <tr>
            <th>Backup</th>
            <th>Site Name</th>
            <th>Site Url</th>
            <th>Last Backup</th>
            <th>Delete</th>
        </tr>
    <?php
    $sql = "SELECT * FROM sites;";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><form action='includes/manage.update.inc.php' method='POST'>
                    <input name='siteUrl' type='hidden' value='" . $row['siteUrl'] . "'/>
                    <button name='submit' type='submit' class='btn btn-info'>Backup</button></form></td>";
            echo "<th>" . $row['siteName'] . "</th>";
            echo "<th>" . $row['siteUrl'] . "</th>";
            echo "<th>" . $row['siteBackupTime'] . "</th>";
            echo "<td><form action='includes/manage.delete.inc.php' method='POST'>
                    <input name='siteUrl' type='hidden' value='" . $row['siteUrl'] . "'/>
                    <button name='submit' type='submit' class='btn btn-danger'>Delete</button></form></td>";
            echo "</tr>";
        } 
    }
    ?>
        <!--<tr>
            <td><div class='btn btn-info'>Backup</div></td>
            <th>Example Name</th>
            <th>Example Url</th>
            <th>1st January 2023</th>
            <td><div class='btn btn-danger'>Delete</div></td>
        </tr>-->
    </table>
</div>
<?php
    include_once 'footer.php';
?>