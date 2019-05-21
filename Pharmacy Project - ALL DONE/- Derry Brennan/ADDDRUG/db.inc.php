<!--Derry Brennan-->
<!--Tutor: Cathrine Moloney-->
<!-- 20/03/2019-->

<!--db.inc.php-->

<?php
$hostname = "localhost";
$username = "pharmacist";
$password = "rosesarered";

$dbname = "Pharmacy";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if(!$con)
{
	die ("Failed to connect to MySQL" . mysqli_connect_error());
}

?>
