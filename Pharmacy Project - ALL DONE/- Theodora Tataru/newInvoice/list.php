<!DOCTYPE html>
<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- March 2018 --->

<!--- Creating the list with suppliers for the invoice --->

<?php
	include '../db.inc.php';
	
	$sql = "SELECT SupplierID, Name, Street, Town, Country FROM Supplier WHERE DeletionFlag=0";
			
	if(!$result = mysqli_query($con, $sql))
	{
		die ('Error in quering thr database - searching a supplier'. mysqli_error($con));
	}
	
	// calling the function populateDoctors()
	echo "<br><select name='nameListBox' id='nameListBox' onclick='populateSuppliers()'>"; 
	
	// sellecting the information from that particular row with suppliers
	while($row=mysqli_fetch_array($result))
	{
		$id = $row['SupplierID'];
		$street = $row['Street'];
		$town = $row['Town'];
		$country = $row['Country'];
		$name = $row['Name'];
		
		$allTheText = "$id^$street^$town^$country^$name";
		
		echo "<option value = '$allTheText'> $name </option>";
	}
	// return the selected lastName, from the drop list
	echo "</select>";
	mysqli_close($con);
?>


			