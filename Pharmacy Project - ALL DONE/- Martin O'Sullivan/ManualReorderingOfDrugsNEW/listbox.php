
<?php
 	include '../db.inc.php';
	$sql = "SELECT SupplierID, Street, Town, Country, Name, Email, WebSite, PhoneNumber FROM Supplier";

	if (!$result = mysqli_query($con, $sql) )
	{
		die("Error in querying the database: ".mysqli_error($con) );
	}

	echo "<br><select name ='listbox' id = 'listbox' onclick='filter()'>";

	while( $row = mysqli_fetch_array($result) ) 
	{
		$id = $row['SupplierID'];
		$street = $row['Street'];
		$town= $row['Town'];
		$country = $row['Country'];
		$name = $row['Name'];
		$email = $row['Email'];
		$website = $row['WebSite'];
		$phoneNumber = $row['PhoneNumber'];

		echo "<option value='$name'>$id. $name - $country </option>";
	}	

	echo "</select>";

	mysqli_close($con);
?>