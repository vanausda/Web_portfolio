<?php

function add() {

	$stock = $_POST['stock'];
	$shares = $_POST['shares'];
    $time_stamp = date("M-d-y H:i:s");

	$portfolio = "portfolio.dat";
	$fp = fopen($portfolio, "a");

	if ($shares == NULL)
		$shares = 0;

	fwrite($fp, "$stock, $shares, $time_stamp\n");

	fclose($fp);
	header("Location: welcome.php");

}

function modify(  ) {

	$stock = $_POST['stock'];
	$shares = $_POST['shares'];

	$portfolio = "portfolio.dat";
	$fp = fopen($portfolio, "r");

	$temp = "temp.dat";
	$tp = fopen($temp, "w+");
	
    while ($line = fgets($fp))
    {
		if (stristr ($line, $stock)) {
			$token = strtok($line, ",");
                	$old_shares = strtok(",");
                	$time = strtok(",");

			if ($shares == NULL)
				$shares = 0;

            fwrite($tp, "$token, $shares, $time");

		}
		else if ($line != '') {
			fwrite($tp, "$line");
		}
    }

    fclose($fp);
	fclose($tp);
	copy($temp, $portfolio);
	header("Location: welcome.php");
}

function delete(  ) {

	$stock = $_POST['stock'];

	$portfolio = "portfolio.dat";
	$fp = fopen($portfolio, "r");

	$temp = "temp.dat";
	$tp = fopen($temp, "w");

	while ($line = fgets($fp))
	{
		if (stristr ($line, $stock)) {
	;
	} else if ($line != '') {
		fwrite($tp, "$line");
		}
	}
	fclose($fp);
	fclose($tp);
	copy($temp, $portfolio);
	header("Location: welcome.php");
}

?>

