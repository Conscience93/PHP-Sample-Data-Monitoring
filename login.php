<?php
    include_once 'header.php';
?>

        <div class='container justify-content-center w-25 p-3' style='background-color: #eeeeee; margin-top: 1em;'>
            <h1 class='display-5'>Log In</h1>
            <form action='includes/login.inc.php' method='POST'>
                <div class='form-row'>
                    <div class='form-group col-md-11'>
                        <label>Email</label>
                        <input type='text' name='email' class='form-control' placeholder='Enter Email' maxlength='30' required>
                    </div>
                    <div class='form-group col-md-11'>
                        <label>Password</label>
                        <input type='password' name='password' class='form-control' placeholder='Enter Password' maxlength='20' required>
                    </div>
                </div>
                <button type='submit' name='submit' class='btn btn-primary'>Log In</button>
            </form>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p class='alert alert-danger'>You didn't fill in all fields!</p>";
                } else
                if ($_GET["error"] == "invalidlogin") {
                    echo "<p class='alert alert-danger'>Invalid username or password.</p>";
                }
            }
        ?>
        </div>
        
<?php
    include_once 'footer.php';
?>