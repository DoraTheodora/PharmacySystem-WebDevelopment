<!DOCTYPE html>
<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- February 2018 --->

<!--- Creating the list  --->

<?php
	include '../db.inc.php';
	
	$sql = "SELECT DoctorID, FirstName, LastName, ClinicAddress, ClinicPhoneNumber,
			HomeAddress, MobileNumber, HomePhoneNumber FROM Doctor WHERE DeletionFlag=0";
			
	if(!$result = mysqli_query($con, $sql))
	{
		die ('Error in quering thr database - searching a doctor'. mysqli_error($con));
	}
	
	// calling the function populateDoctors()
	echo "<br><select name='nameListBox' id='nameListBox' onclick='populateDoctors()'>"; 
	
	// sellectin the information from that particular row
	while($row=mysqli_fetch_array($result))
	{
		$id = $row['DoctorID'];
		$firstName = $row['FirstName'];
		$lastName = $row['LastName'];
		$cAddress = $row['ClinicAddress'];
		$cNumber = $row['ClinicPhoneNumber'];
		$hAddress = $row['HomeAddress'];
		$mNumber = $row['MobileNumber'];
		$hPhoneNumber = $row['HomePhoneNumber'];
		
		$allTheText = "$id^$firstName^$lastName^$cAddress^$cNumber^$hAddress^$mNumber^$hPhoneNumber";
		
		echo "<option value = '$allTheText'> $firstName  $lastName </option>";
	}
	// return the selected lastName, from the drop list
	echo "</select>";
	mysqli_close($con);
?>


			