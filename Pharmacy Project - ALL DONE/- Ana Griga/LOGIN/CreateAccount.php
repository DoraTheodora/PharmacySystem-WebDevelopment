<?php

include 'db.inc.php';//connection with the database	

$sql = "INSERT INTO LogIn (UserId, Password) VALUES ('$_POST[UserId]' , '$_POST[Password]')";
		

if(!mysqli_query($con, $sql))
	{
		die ("An error in the SQL Query : ". mysqli_error($con));
		echo "<script> showalert('red');</script>";
	}
else
	{
		echo "<script> showalert('green');</script>";
		include 'LogIn.html.php';
	}

mysqli_close($con);
?>

