<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- February 2018 --->

<!--- database Query - add a doctor  --->

	<!-- POP UP WINDOWS -->
	<script>
		function showalert(type)
			{	
				document.getElementById(type).style.display = "block";		
				setTimeout(function() {document.getElementById(type).style.display = "none";},4000);		
			}
			
		function hidealert(type)
			{	
				setTimeout(function() {document.getElementById(type).style.display = "none";},1);			
			}
	</script>

<?php
	include 'editDoctor.html.php';
	
	// udating changes of a doctor
	$sql = "UPDATE Doctor SET FirstName = '$_POST[editFirstName]',
								LastName = '$_POST[editLastName]',
								ClinicAddress = '$_POST[editClinicAddress]',
								ClinicPhoneNumber = '$_POST[editClinicPhoneNumber]',
								MobileNumber = '$_POST[editMobileNumber]',
								HomeAddress = '$_POST[editHomeAddress]',  
								HomePhoneNumber = '$_POST[editHomePhoneNumber]'
			WHERE DoctorID = $_POST[ID]";
	
	//echo $sql; //check the SQL
	
	// connecting to the database
	include '../db.inc.php';
	
	if(!mysqli_query($con, $sql)) 
	{ 
		echo "Did Not Work! ".mysqli_error($con);
		echo "<script> showalert('red'); </script>"; 
	}
	else
	{
		if(mysqli_affected_rows($con) != 0)
		{
		//echo "Success";
		//echo "Did Not Work! ".mysqli_error($con);
		// echo '<script> alert("The new entry added successfuly!") </script>';
		 	echo "<script> showalert('green','The entry was successfully updated!'); </script>"; 
		}
		else
		{
			echo "<script> showalert('blue','Page Refreshed!'); </script>"; 
		}
	}
	mysqli_close($con);	
?>



	