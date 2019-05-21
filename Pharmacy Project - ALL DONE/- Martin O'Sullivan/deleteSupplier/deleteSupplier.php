<?php
	//include 'deleteSupplier.html.php';
	
	echo "Supplier ID is " . $_POST['SupplierID'] . "<br>";
	$sql = "UPDATE Supplier SET DeletionFlag = 1 WHERE SupplierID = '$_POST[SupplierID]'";
		
	include '../db.inc.php';
	
	if(!mysqli_query($con, $sql)) 
	{ 
		echo "Error: ".mysqli_error($con);
		echo "<script> showalert('red'); </script>"; 
	}
	else
	{
		if(mysqli_affected_rows($con) != 0)
		{
		 	echo "<script> showalert('green','Sucessfully Deleted'); </script>";
			echo "Sucess";
		}
		else
		{
			echo "<script> showalert('red','Failed To Delete'); </script>";
			echo "Fail";
		}
	}
	
	mysqli_close($con);	
?>

<form action="deleteSupplier.html.php" method="post" >
	<input type ="submit" value="Return to Previuous Screen">

	