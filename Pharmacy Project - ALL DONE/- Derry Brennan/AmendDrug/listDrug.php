<!--- Derry Brennan--->
<!--- Tutor: Catherine Moloney--->
<!--- 18/03/2019 --->
<!--- Drug listbox --->
<?php
include "../db.inc.php"; //db connection

$sql = "SELECT DrugID, BrandName, GenericName, Strength, Form, UsageInstructions, SideEffects, CostPrice, RetailPrice, ReorderLevel, ReorderQuantity, Quantity FROM Drug WHERE DeletionFlag = 0";

if (!$result = mysqli_query($con, $sql))
{
	die('Error getting drug info from Drug table' .  mysqli_error($con));
}

echo "<br><select name = 'listDrug' id = 'listDrug' onclick = 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
	$drugid= $row['DrugID'];
	$brandname = $row['BrandName'];
	$genericname = $row['GenericName'];
	$strength = $row['Strength'];
	$form = $row['Form'];
	$usageinstructions = $row['UsageInstructions'];
	$sideeffects = $row['SideEffects'];
	$costprice = $row['CostPrice'];
	$retailprice = $row['RetailPrice'];
	$reorderlevel = $row['ReorderLevel'];
	$reorderquantity = $row['ReorderQuantity'];
	$quantity = $row['Quantity'];
	$allText = "$drugid,$brandname,$genericname,$strength,$form,$usageinstructions,$sideeffects,$costprice,$retailprice,$reorderlevel,$reorderquantity,$quantity";
	//$allText = "$drugid,$brandname,$genericname,$strength";
	echo "<option value = '$allText'>$drugid $brandname $genericname $strength</option>";
}
echo "</select>";
mysqli_close($con);


?>