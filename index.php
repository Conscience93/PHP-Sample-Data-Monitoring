<?php
    include_once 'header.php';
?>
    <?php
        if (isset($_SESSION["userid"])) {
            echo "<p class='container justify-content-center w-30 p-3' id='about-title'>Hello there, " . $_SESSION["username"] . "!</p>";
        }
    ?>
    	<div class="container justify-content-center w-30 p-3 about-title" id='about-title'>
    		<h2>Welcome to Data Monitoring System!</h2>
    	</div>
        <div class="container justify-content-center w-25 p-3 about-description" id='about-description'>
            <p>This is the page for data monitoring system.</p>
        </div>

<?php
    include_once 'footer.php';
?>