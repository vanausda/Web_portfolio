<?php
        session_start();

        if ($_SESSION['username'] == "") {
            header("Location: login.php?error=2");
        }
	echo "Good Bye, " . $_SESSION['username'];
	session_destroy();
	
	echo "<br><br><a href='login.php'>Log in again</a><br>";

?>
