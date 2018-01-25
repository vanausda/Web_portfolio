<html>
<style>
#main_heading {
	font-size: 40px;
	text-align: center;
}

#main {
	text-align: center;
}

</style>
<body>

<h1 id="main_heading">Member login page</h1>
<div id="main">
<table id="table">

<form action="verify.php" method="post" >
<table><tr>
	<td>Username:<input type="text" name="username"></td>
</tr> <br><br>
<tr>
	<td>Password:<input name="password" type="password"></td>
</tr><br><br>
<tr>
	<td><input type="submit" value="Log In"></td></tr><br>
</table>
</form>
<?php

	$error = $_GET['error'];

	if ($error == 1) {

		echo "Invalid username or password";

	 } else if ($error == 2){
		echo "You must log in first";
	}

?>

</div>
</body>
</html>
