<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- March 2018 --->

<!--- New Invoice  --->

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
	include 'invoice.html.php';
	include '../db.inc.php';
	
	//add a new invoice
	$sql = "INSERT INTO Invoice (InvoiceID, SupplierReference, IssueDate, Amount, SupplierID)
			VALUES('$_POST[InvoiceID]', '$_POST[SupplierReference]','$_POST[IssueDate]','$_POST[Amount]','$_POST[SupplierID]')";
	
	// connecting to the database
	include '../db.inc.php';
	
	if(!mysqli_query($con, $sql)) 
	{ 
		echo "Did Not Work! ".mysqli_error($con);
		echo "<script> showalert('red','The entry failed to be added into the database'); </script>"; 
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
	