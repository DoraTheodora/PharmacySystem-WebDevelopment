<!--- Derry Brennan C00231080--->
<!--- Tutor: Catherine Moloney--->
<!--- 18/03/2019 --->
<!--- DeleteDrug.php --->
	<!-- POP UP WINDOWS -->
	<script>
		function showalert(type)
			{	
				document.getElementById(type).style.display = "block";
				setTimeout(function() {document.getElementById(colour).style.display = "none";},4000);		
			}
			
		function hidealert(type)
			{
				document.getElementById(type).style.display = "block";
				setTimeout(function() {document.getElementById(type).style.display = "none";},1);			
			}
	</script>

<?php
	include 'DeleteDrug.html.php';
	// udating changes of a doctor
	$sql = "UPDATE Drug 
			SET DeletionFlag = 1 
			WHERE DrugID = $_POST[deletedrugid] 
			AND Quantity = 0";

	// connecting to the database
	include '../db.inc.php';

	if(isset($_POST[deletedrugid]))
	{
		if(!mysqli_query($con, $sql)) 
		{ 
			echo "Did Not Work! ".mysqli_error($con);
			echo "<script> showalert('red','Error No Drug Selected'); </script>";
		}
		else
		{
			if(mysqli_affected_rows($con) != 0)
			{
				echo "<script> showalert('green','The drug was deleted'); </script>"; 
			}
			else
			{
				echo "<script> showalert('red','Drug is none zero'); </script>";
			}
		}
	}
	mysqli_close($con);	
?>


