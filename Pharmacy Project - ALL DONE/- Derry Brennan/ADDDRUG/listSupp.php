<!--Derry Brennan-->
<!--Tutor: Cathrine Moloney-->
<!-- 20/03/2019-->

<!--listSupp.php-->

<?php
include "db.inc.php"; //db connection_aborted

$sql = "SELECT SupplierId, Name FROM Supplier Where DeletionFlag = 0";

if (!$result = mysqli_query($con, $sql))
{
	die('Error getting person info from persons table' .  mysqli_error($con));
}
echo "<label for='suppliername'>Supplier Name</label>";
echo "<br><select name = 'listSupp' id = 'listSupp' onclick = 'populateSuppId()'>";

while ($row = mysqli_fetch_array($result))
{
	$sid = $row['SupplierId'];
	$name = $row['Name'];
	$allText = "$sid,$name";
	echo "<option value = '$allText'>$name</option>";
}
echo "</select>";
mysqli_close($con);


?>