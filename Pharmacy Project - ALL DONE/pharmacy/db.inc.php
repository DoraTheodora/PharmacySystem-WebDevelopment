<?php
	$hostname = "localhost";
	$username ="root";
	$password = "";
	$dbname = "myDBc00231987_";

	$con = mysqli_connect( $hostname, $username, $password, $dbname );
	
	if (!$con)
	{
		echo "-= Failed to connect to MySQL: ".mysqli_connect_error();
	}
?>