<!--Derry Brennan-->
<!--Tutor: Catherine Moloney-->
<!--20/03/2019-->

<!--Dispense Drugs-->

	<!--pop up scripts for red/green boxes-->
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
	date_default_timezone_set("UTC");
	include 'dispenseDrugs.html.php';
	include '../db.inc.php';
	
	$id = "SELECT MAX(PrescriptionID) as NewID FROM Prescription";
if (!$answer = mysqli_query($con,$id))
{
	die ("An error occured getting Prescription Id from the table: " . mysqli_error($con) );
}
$row =  mysqli_fetch_assoc($answer);
$newId = $row['NewID'] + 1;
$sql = "Insert into Prescription (PrescriptionID,Date,DoctorID,CustomerID)
VALUES ($newId,'$_POST[pdate]','$_POST[docId]','$_POST[custId]')";
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
	