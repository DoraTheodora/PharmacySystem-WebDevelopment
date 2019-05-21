<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Add Customer Unit PHP-->

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

include 'db.inc.php'; // connection with the database
include 'AddCustomer.html.php';
date_default_timezone_set("UTC");

//coding the unique number for the primary key CustomerID
$mysql = "Select MAX(CustomerID) as maximumID from Customer ";

if(!$result = mysqli_query($con, $mysql))
	{
		die ("An error in the SQL Query : ". mysqli_error($con));
		
	}

$row = mysqli_fetch_assoc($result);
$uniqueKey = $row['maximumID'];
$uniqueKey = $uniqueKey +1;

$sql = "Insert into Customer (CustomerID, FirstName, LastName, Address, DateOfBirth, PhoneNumber) 
		VALUES ( $uniqueKey, '$_POST[FirstName]' , '$_POST[LastName]' , '$_POST[Address]', '$_POST[DateOfBirth]' , '$_POST[PhoneNumber]')";

if(!mysqli_query($con, $sql))
	{
		die ("An error in the SQL Query : ". mysqli_error($con));
		echo "<script> showalert('red');</script>";
	}
else
	{
		echo "<script> showalert('green');</script>";
	}

mysqli_close($con);
?>