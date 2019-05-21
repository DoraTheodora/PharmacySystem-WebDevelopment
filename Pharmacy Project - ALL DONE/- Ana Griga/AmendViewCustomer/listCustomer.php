<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Add Customer Unit PHP-->

<?php 

include 'db.inc.php'; //database connection

date_default_timezone_set("UTC");

$sql = "SELECT CustomerID, FirstName, LastName, Address, DateOfBirth, PhoneNumber FROM Customer";

if (!$result = mysqli_query($con, $sql))
{
	die( "Error in querying the database " . mysqli_error($con));
}

echo "<br><select name = 'listCustomer' id = 'listCustomer' onclick = 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
	$amendid = $row['CustomerID'];
	$amendfirstname= $row['FirstName'];
	$amendlastname = $row['LastName'];
	$amendaddress = $row['Address'];
	$amenddateofbirth = $row['DateOfBirth'];
	$amendphonenumber = $row['PhoneNumber'];
	$allText = "$amendid+$amendfirstname+$amendlastname+$amendaddress+$amenddateofbirth+$amendphonenumber";
	echo "<option value = '$allText'>$amendfirstname $amendlastname </option>";
}
echo "</select>";
mysqli_close($con);

?>