<?php
    include_once 'header.php';
?>
        <div class='container justify-content-center w-25 p-3' style='background-color: #eeeeee; margin-top: 1em;'>
            <h1 class='display-5'>Back Up</h1>
            <form action='includes/backup.inc.php' method='POST'>
                <div class='form-row'>
                    <div class='form-group col-md-11'>
                        <label>Site Name</label>
                        <input type='text' name='siteName' class='form-control' placeholder='Enter Site Name' required>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-11'>
                        <label>Site Url (Includes http or https)</label>
                        <input type='text' name='siteUrl' class='form-control' placeholder='Enter Site Url' required>
                    </div>
                </div>
                <button name='submit' type='submit' class='btn btn-primary'>Add Site</button>
            </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "statementFailed") {
                echo "<p class='alert alert-danger'>Something happened. Please try again.</p>";
            } else
            if ($_GET["error"] == "invalidUrl") {
                echo "<p class='alert alert-danger'>The url entered is invalid!</p>";
            } else
            if ($_GET["error"] == "siteUrlExists") {
                echo "<p class='alert alert-danger'>Site Url is already existed!</p>";
            } else
            if ($_GET["error"] == "none") {
                echo "<p class='alert alert-info'>Site backup has been added.</p>";
            }
        }
        ?>
        </div>

<?php
    include_once 'footer.php';
?>