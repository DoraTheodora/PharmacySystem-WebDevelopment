<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- February 2018 --->
<!--- database Query - add a doctor  --->

	<!-- POP UP WINDOWS -->
	<script>
		function showalert(type)
			{	
				document.getElementById(type).style.display = "block";		
				setTimeout(function() 	{document.getElementById(type).style.display = "none";},4000);		
			}
			
		function hidealert(type)
			{	
				setTimeout(function() {document.getElementById(type).style.display = "none";},1);			
			}
	</script>

<?php
	// include connection file
	include '../db.inc.php';
	// include the form
	include 'addDoctor.html.php';
	
	//incrementing the PRIMARY KEY using a php function
	$sqlID = "SELECT MAX(DoctorID) AS MaxID FROM Doctor";
			
			if(!$result = mysqli_query($con, $sqlID))
			{
				die('Error in quering the database'.mysqli_error($con));
			}
			
			$row = mysqli_fetch_assoc($result);
			$max = $row['MaxID'];
			
			$primaryKey = $max + 1;
	// end of INCREMENTING PRIMARY KEY FUNTION
	
	// adding a new doctor
	$sql = "Insert into Doctor(DoctorID, FirstName, LastName, ClinicAddress, ClinicPhoneNumber,
			HomeAddress, MobileNumber, HomePhoneNumber)
			VALUES($primaryKey, '$_POST[FirstName]', '$_POST[LastName]', '$_POST[ClinicAddress]',
			'$_POST[ClinicPhoneNumber]', '$_POST[HomeAddress]', '$_POST[MobileNumber]',
			'$_POST[HomePhoneNumber]')";
			
		if(!mysqli_query($con, $sql)) 
		{ 
			//echo "Did Not Work! ".mysqli_error($con);
			echo "<script> showalert('red', 'The new entry failed to be added into the database!'); </script>"; 
		}
		else
		{
			//echo "Success";
			//echo "Did Not Work! ".mysqli_error($con);
			// echo '<script> alert("The new entry added successfuly!") </script>';
			 echo "<script> showalert('green','The new entry was added successfully into the database'); </script>"; 
			 
		}
	mysqli_close($con);	
?>

	