<?php
 	include '../db.inc.php';
	$sql = "SELECT OrderTable.* , Supplier.* FROM OrderTable 
			INNER JOIN Supplier on (OrderTable.SupplierID = Supplier.SupplierID)
			WHERE DeliveryDate IS NULL";

	echo "<h2>Reciever Drug Delieveries</h2>";

	if (!$result = mysqli_query($con, $sql) )
	{
		die("Error in querying the database: ".mysqli_error($con) );
	}

	echo "<br><select name ='listbox' id ='listbox' onclick = 'filter()'>";

	while($row = mysqli_fetch_array($result) ) 
	{
		$OrderID = $row['OrderID']; 	// Order Number
		$Date = $row['Date'];			// Order Date
		$SupplierName = $row['Name']; 	// Supplier Name
		$Street = $row['Street'];		// Supplier Address
		$Town = $row['Town'];
		$Country = $row['Country'];

		$allText = "$OrderID,$Date,$SupplierName,$Street,$Town,$Country";
		echo "<option value='$allText'>Order : $OrderID - $SupplierName - $Date </option>";
	}	

	echo "</select>";

	mysqli_close($con);
?>