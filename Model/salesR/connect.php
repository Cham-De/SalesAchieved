<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "salesachieved_test";
	// $dbname = "test";
	
	if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
	{
		die("failed to connect!");
	}
?>