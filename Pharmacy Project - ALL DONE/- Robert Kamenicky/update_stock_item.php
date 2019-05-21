<!-- Robert Kamenicky C00231987-->
<!-- Tutor: Catherine Moloney-->
<!-- Update the Stock Item -->


<?php

	include 'db.inc.php';

	$sql = "Update Stock set Name='$_POST[name]',CostPrice='$_POST[cPrice]',RetailPrice='$_POST[rPrice]',ReOrderLevel='$_POST[orderLevel]',ReOrderQuantity='$_POST[orderQuantity]',SupplierID='$_POST[supplierlist]' where StockID='$_POST[StockID]'";

	$updNum = "$_POST[StockID]";

	if (!mysqli_query($con,$sql))
	{   
		die ("An Error in the SQL Query: ". mysqli_error($con));
	}

	{

 header("Location:listofproducts.php?id=$updNum-updated");
}

?>