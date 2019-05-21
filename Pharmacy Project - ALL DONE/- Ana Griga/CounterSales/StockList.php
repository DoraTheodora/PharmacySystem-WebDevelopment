<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Counter Sale Unit PHP-->

<?php 

include 'db.inc.php'; //database connection

date_default_timezone_set("UTC");

$sql = "SELECT Name, RetailPrice FROM Stock";

if (!$result = mysqli_query($con, $sql))
{
	die( "Error in querying the database " . mysqli_error($con));
}

echo "<br><select name = 'StockList' id = 'StockList' onclick = 'populateStock()'>";

while ($row = mysqli_fetch_array($result))
{
//	$id = $row['StockID'];
	$name= $row['Name'];
//	$costprice = $row['CostPrice'];
	$retailprice = $row['RetailPrice'];
//	$reorderlevel = $row['ReOrderLevel'];
//	$reorderquantity = $row['ReOrderQuantity'];
//	$quantity = $row['Quantity'];
//	$supplierid = $row['SupplierID'];
	$allText = "$name+$retailprice";
	echo "<option value = '$allText'>$name</option>";
}
echo "</select>";
mysqli_close($con);

?>