<script>
	function alertbox(colour)
	{
		document.getElementById(colour).style.display = "block";
		setTimeout(function() {document.getElementById(colour).style.display = "none";},5000);
	}
	function hidealert(colour)
	{
		setTimeout(function() {document.getElementById(colour).style.display = "none";},1);
	}
</script>
<?php
include 'AmendDrug.html.php';
include 'db.inc.php';
date_default_timezone_set("UTC");

$sql = "Update Drug SET 
						BrandName = '$_POST[amendbrandname]',
						GenericName = '$_POST[amendgenericname]',
						Strength = '$_POST[amendstrength]',
						Form = '$_POST[amendform]',
						Quantity = '$_POST[amendquantity]',
						UsageInstructions = '$_POST[amendusageinstructions]',
						SideEffects = '$_POST[amendsideeffects]',
						CostPrice = $_POST[amendcostprice],
						RetailPrice = $_POST[amendretailprice],
						ReorderLevel = $_POST[amendreorderlevel],
						ReorderQuantity = $_POST[amendreorderquantity]
						WHERE DrugID = $_POST[amenddrugid] ";
if (!mysqli_query($con,$sql))
{
	echo "<script> alertbox('red','The details have not been updated'); </script>";
}
else
{
		if(mysqli_affected_rows($con) != 0)
		{
		 	echo "<script> showalert('green','The Drug detailed has been updated!'); </script>"; 
		}
		else
		{
			echo "<script> showalert('blue','Refreshed'); </script>"; 
		}
}
mysqli_close($con); 
?>
