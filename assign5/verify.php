<?php
	session_start();

 	if ($_SESSION['username'] == "") {
  		header("Location: login.php?error=2");
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username == "bean_dog_722" && $password == "Be@ner2007")
	{
	$_SESSION['username'] = $username;
	header("Location: welcome.php");

	}else{
	$_GET['error'] = $error;
	header("Location: login.php?error=1");
	}
?>
