<!--Derry Brennan-->
<!--Tutor: Catherine Moloney-->
<!--20/03/2019-->

<?php 

include '../db.inc.php'; //database connection

date_default_timezone_set("UTC");

$sql = "SELECT CustomerID, FirstName, LastName FROM Customer";

if (!$result = mysqli_query($con, $sql))
{
	die( "Error in querying the database " . mysqli_error($con));
}

echo "<br><select name = 'listCust' id = 'listCust' onclick = 'populateCustId()'>";

while ($row = mysqli_fetch_array($result))
{
	$amendid = $row['CustomerID'];
	$amendfirstname= $row['FirstName'];
	$amendlastname = $row['LastName'];
	
	$allText = "$amendid,$amendfirstname,$amendlastname";
	echo "<option value = '$allText'>$amendfirstname $amendlastname </option>";
}
echo "</select>";
mysqli_close($con);

?>