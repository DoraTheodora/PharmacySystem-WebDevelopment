<!DOCTYPE html>
<!--Derry Brennan-->
<!--Tutor: Catherine Moloney-->
<!--20/03/2019-->

<!--Listing the doctors-->

<?php
	include '../db.inc.php';
	
	$sql = "SELECT DoctorID, FirstName, LastName FROM Doctor WHERE DeletionFlag=0";
			
	if(!$result = mysqli_query($con, $sql))
	{
		die ('Error in quering thr database, your doctor sql is off!'. mysqli_error($con));
	}
	
	// populate doctor ID
	echo "<br><select name='listDoc' id='listDoc' onclick='populateDocId()'>"; 
	
	// pulling in needed items
	while($row=mysqli_fetch_array($result))
	{
		$id = $row['DoctorID'];
		$firstName = $row['FirstName'];
		$lastName = $row['LastName'];
		
		$allTheText = "$id,$firstName,$lastName";
		
		echo "<option value = '$allTheText'> $firstName  $lastName </option>";
	}
	// return the selected lastName, from the drop list
	echo "</select>";
	mysqli_close($con);
?>


			