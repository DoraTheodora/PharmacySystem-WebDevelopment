
<?php
	include '../db.inc.php';

	echo "OrderID is : " . $_POST['OrderID'];

	if($result= mysqli_query($con,"Update OrderTable SET DeliveryDate = now() WHERE OrderID = " . $_POST['OrderID']) );
	{
		die('Error in quering the database '. mysqli_error($con));
	}

	if($result= mysqli_query($con,"SELECT Drug.* , OrderItem.* FROM Drug 
								   INNER JOIN OrderItem on (OrderItem.DrugID = Drug.DrugID)
								   INNER JOIN Supplier  on (Drug.SupplierID = Supplier.SupplierID) 
								   WHERE OrderID = " . $_POST['OrderID']) );
	{
		die('Error in quering the database '. mysqli_error($con));
	}



/*

Update Drug SET Drug.Quantity = OrderItem.Quantity + Drug.Quantity
INNER JOIN OrderItem on (OrderItem.DrugID = Drug.DrugID)
WHERE OrderItem.OrderID = 3

*/
?>