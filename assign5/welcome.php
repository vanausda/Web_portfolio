<?php
        session_start();
        if ($_SESSION['username'] == "") {
                header("Location: login.php?error=2");
        }
	include 'process.php';
	$username = $_SESSION['username'];
?>
<html>
<head>  <meta charset="UTF-8"/>
<style>
li {
	list-style-type: none;
	text-align: left;
}

body {
	background : lightblue;
}

form {
	margin: 0 auto;
	width: 250px;
}

div {

	display: table;
	margin-left: auto;
	margin-right: auto;
}

</style>
</head>
<body>
<div id="main_div">
<form id="my_form" action="" method="post" >
<table id="table">
<tr>
	<td><h2>Welcome</h2></td><td><h2><?php echo $username; ?></h2></td>
</tr>
<tr>
	<td>Stock tick:</td><td> <input name="stock" type="text" id="stock" required ></td><br>
</tr>
<tr>
	<td>Number of shares:</td><td> <input name="shares" type="text" id="shares" ></td><br> 
</tr>
<tr>
	<td><input type="radio" name="purchase" value="purchase">Purchase</td>
</tr>
<tr>
	<td><input type="radio" name="modify" value="modify">Modify</td>
</tr>
<tr>
	<td><input type="radio" name="delete" value="delete">Delete</td>
</tr>
<tr>
	<td><input type="submit" name="submit" value="Select"></td>
</tr>
</table>
</form>
</div><br><br><br>


<?php
	$stock = $_POST['stock'];
	$shares = $_POST['shares'];

        if ( isset($_POST['submit']) && isset( $_POST['purchase']) ) {
		add( );
	}

        else if ( isset($_POST['submit']) && isset( $_POST['modify']) ) {
		modify( );
	}

        else if ( isset($_POST['submit']) && isset( $_POST['delete']) ) {
		delete( );

	}

?>

<div id="div2">
<h2>Your portfolio</h2>
<?php

	$file_name = "portfolio.dat";
	$fp = fopen($file_name, "r");
	echo "<ul>";

	while ($line = fgets($fp))
	{
		$stock = strtok($line, ",");
		$shares = strtok(",");
		$time = strtok(",");
		echo "<li>$stock $shares $time</li>";
	}
	echo "</ul>";
	fclose($fp);
?>
<a href="signout.php" >Log Out</a>
</div>
</body>
</html>
