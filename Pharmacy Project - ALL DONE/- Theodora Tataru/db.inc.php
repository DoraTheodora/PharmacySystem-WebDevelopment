<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- February 2018 --->

<!--- Connecting to the database --->

<?php
$hostname = "localhost";
$username = "pharmacist";
$password = "rosesarered";

$dbname = "Pharmacy";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if(!$con)
{
	die ("Failed to connect to MySQL database: ".mysqli_connect_error());
}
?>