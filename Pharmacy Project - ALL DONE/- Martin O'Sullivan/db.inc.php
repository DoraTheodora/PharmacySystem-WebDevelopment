<?php
	$hostname = "localhost";
	$username ="pharmacist";
	$dbname = "Pharmacy";
	$password = "rosesarered";

	$con = mysqli_connect( $hostname, $username, $password, $dbname );

	if (!$con)
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}		
?>