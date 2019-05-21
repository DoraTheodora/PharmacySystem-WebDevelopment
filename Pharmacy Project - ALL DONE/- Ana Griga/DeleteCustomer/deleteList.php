<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Delete Customer Unit PHP-->

<?php 

include 'db.inc.php'; //database connection

date_default_timezone_set("UTC");

$sql = "SELECT CustomerID, FirstName, LastName, Address, DateOfBirth, PhoneNumber FROM Customer WHERE DeletionFlag=0";

if (!$result = mysqli_query($con, $sql))
{
	die( "Error in querying the database " . mysqli_error($con));
}

echo "<br><select name = 'deleteList' id = 'deleteList' onclick = 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
	$deleteid = $row['CustomerID'];
	$deletefirstname= $row['FirstName'];
	$deletelastname = $row['LastName'];
	$deleteaddress = $row['Address'];
	$deletedateofbirth = $row['DateOfBirth'];
	$deletephonenumber = $row['PhoneNumber'];
	$allText = "$deleteid+$deletefirstname+$deletelastname+$deleteaddress+$deletedateofbirth+$deletephonenumber";
	echo "<option value = '$allText'>$deletefirstname $deletelastname </option>";
}
echo "</select>";
mysqli_close($con);

?>