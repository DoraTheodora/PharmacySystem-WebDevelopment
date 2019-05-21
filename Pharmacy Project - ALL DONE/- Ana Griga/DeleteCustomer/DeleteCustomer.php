<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Delete Customer Unit PHP-->

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

<?php session_start();

include 'db.inc.php';//connection with the database	

date_default_timezone_set('UTC');

$sql = "Update Customer SET DeletionFlag = 1 WHERE CustomerID = $_POST[deleteid]";
	

	
if (! mysqli_query($con,$sql))
	{
		echo "Error doing Query" . mysqli_error($con);
		echo"<script> showalert('red');</script>";
	}
else
	{
		if (mysqli_affected_rows($con) != 0)
			{
				echo mysqli_affected_rows($con)." record(s) updated <br>";
				//echo "Customer Id ".$_POST['amendid'].", ".$_POST['amendfirstname']
				//." ".$_POST['amendlastname']." has been updated";
				echo"<script> showalert('green');</script>";
			}
		else
			{
				echo "No records were changed";
			}
	}
	
//set session variables
$_SESSION["CustomerID"] = $_POST['deleteid'];
$_SESSION["FirstName"] = $_POST['deletefirstname'];
$_SESSION["LastName"] = $_POST['deletelastname'];
$_SESSION["Address"] = $_POST['deleteaddress'];
$_SESSION["DateOfBirth"] = $_POST['deletedateofbirth'];
$_SESSION["PhoneNumber"] = $_POST['deletephonenumber'];


mysqli_close($con);
?>

