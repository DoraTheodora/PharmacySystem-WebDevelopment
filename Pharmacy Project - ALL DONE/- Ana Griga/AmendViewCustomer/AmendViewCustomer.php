<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Amend/ View Customer Unit PHP-->

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

include 'AmendViewCustomer.html.php';

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amenddateofbirth'])); //to match date format in database

$sql = "Update Customer SET FirstName = '$_POST[amendfirstname]',
		LastName = '$_POST[amendlastname]', Address = '$_POST[amendaddress]',
		DateOfBirth = '$dbDate', PhoneNumber = '$_POST[amendphonenumber]' WHERE CustomerID = $_POST[amendid]";
	
include 'db.inc.php';//connection with the database	
	
if (! mysqli_query($con,$sql) )
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
mysqli_close($con);
?>
