<?php
    include_once 'header.php';
?>
        <div class='container justify-content-center w-25 p-3' style='background-color: #eeeeee; margin-top: 1em;'>
            <h1 class='display-5'>Sign Up</h1>
            <form action='includes/signup.inc.php' method='POST'>
                <div class='form-row'>
                    <div class='form-group col-md-11'>
                        <label>Username</label>
                        <input type='text' name='username' class='form-control' placeholder='Enter Username' maxlength='20' required>
                    </div>
                    <div class='form-group col-md-11'>
                        <label>Email</label>
                        <input type='text' name='email' class='form-control' placeholder='Enter Email' maxlength='30' required>
                    </div>
                </div>
                <div class="form-row">
                    <div class='form-group col-md-11'>
                        <label>Password</label>
                        <input type='password' name='password' class='form-control' placeholder='Enter Password' maxlength='20' required>
                    </div>
                    <div class='form-group col-md-11'>
                        <label>Confirm Password</label>
                        <input type='password' name='confirmPassword' class='form-control' placeholder='Confirm Password' maxlength='20' required>
                    </div>
                </div>
                <button name='submit' type='submit' class='btn btn-primary' style='margin-bottom: 2em;'>Sign Up</button>
            </form>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p class='alert alert-danger'>You didn't fill in all fields!</p>";
            } else
            if ($_GET["error"] == "invalidusername") {
                echo "<p class='alert alert-danger'>Username cannot have special characters!</p>";
            } else
            if ($_GET["error"] == "invalidemail") {
                echo "<p class='alert alert-danger'>Email is invalid!</p>";
            } else
            if ($_GET["error"] == "passwordnotmatch") {
                echo "<p class='alert alert-danger'>Passwords do not match!</p>";
            } else
            if ($_GET["error"] == "emailtaken") {
                echo "<p class='alert alert-danger'>The email is already taken.</p>";
            } else
            if ($_GET["error"] == "statementFailed") {
                echo "<p class='alert alert-danger'>YSomething went wrong. Please try again.</p>";
            } else
            if ($_GET["error"] == "none") {
                echo "<p class='alert alert-info'>You have succesfully signed up.</p>";
            }
        }
    ?>
        </div>

<?php
    include_once 'footer.php';
?>
