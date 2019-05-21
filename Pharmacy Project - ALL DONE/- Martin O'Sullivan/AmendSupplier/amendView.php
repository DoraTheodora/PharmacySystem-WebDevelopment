<!--
Martin O'Sullivan
C00227188
Lecturer : Catherine Moloney
-->


<?php
	include '../db.inc.php';

	$sql = "UPDATE Supplier SET Street = '$_POST[Street]', Town = '$_POST[Town]', Country = '$_POST[Country]', Name = '$_POST[SupplierName]', Email = '$_POST[Email]', WebSite = '$_POST[Website]', PhoneNumber = '$_POST[Telephone]' WHERE SupplierID = '$_POST[SupplierID]' ";

	echo $_POST['SupplierID'] . " SupplierID, Name : " . $_POST[SupplierName];

	if (!mysqli_query($con, $sql) )
	{	
		die("Error :" . mysql_error()); 
	}
	else
	{
		if (mysqli_affected_rows($con) != 0 )
		{	
			echo mysqli_affected_rows($con)." record(s) updated <br>";
			echo $_POST['Street'] ." ".$_POST['Town']." ".$_POST['Country']." ".$_POST['SupplierName']." ".$_POST['Email']." ".$_POST['Website']." ".$_POST['Telephone']. " has been updated";
		}
		else
		{	
			echo "No records were changed";	
		}
	}
	mysqli_close($con);
?>

<form action="amendSupplier.html.php" method="post" >
	<input type ="submit" value="Return to Previuous Screen">