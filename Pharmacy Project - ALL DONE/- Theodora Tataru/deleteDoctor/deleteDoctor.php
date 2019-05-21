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
	include 'deleteDoctor.html.php';
	
	// udating changes of a doctor
	$sql = "UPDATE Doctor SET DeletionFlag = 1 WHERE DoctorID = $_POST[ID]";
	
	//echo $sql; //check the SQL
	
	// connecting to the database
	include '../db.inc.php';
	
	if(!mysqli_query($con, $sql)) 
	{ 
		echo "Did Not Work! ".mysqli_error($con);
		echo "<script> showalert('red','The entry failed to be deleted!'); </script>"; 
	}
	else
	{
		if(mysqli_affected_rows($con) != 0)
		{
		//echo "Success";
		// echo '<script> alert("The new entry added successfuly!") </script>';
		 	echo "<script> showalert('green','The entry was successfully deleted!'); </script>"; 
		}
		else
		{
			echo "<script> showalert('blue','Page Refreshed!',); </script>"; 
		}
	}
	mysqli_close($con);	
?>



	