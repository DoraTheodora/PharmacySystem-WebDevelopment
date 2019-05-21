<?php
	include '../db.inc.php';

	$sqlID = "SELECT Max(OrderID) AS OID FROM OrderTable";
	if(!$result = mysqli_query($con, $sqlID))
	{
		die('Error in quering the database '. mysqli_error($con));
	}
	$row = mysqli_fetch_assoc($result);
	$OrderID = $row['OID'] + 1;
	


	$first = true;
	foreach( $_POST as $Element ) 
	{	
		$Quantity = substr($Element,0, strrpos($Element,"_")-3);
		$DrugID = substr($Element,strpos($Element,"_")+1, strrpos($Element,"_")-3);
		$DrugID = trim(str_replace("_","",$DrugID));
		$SupplierID = substr($Element,strrpos($Element,"_")+1);
		
		
		
		if($first)
		{
			$first = false;	
			$sql = "Insert into OrderTable(OrderID, Date, SupplierID) VALUES ($OrderID ,now(),$SupplierID)";
			if (!mysqli_query($con, $sql) )
			{	
				die('Error adding to database '. mysqli_error($con));
			}
			else
			{
				if (mysqli_affected_rows($con) != 0 )
				{	
				}
				else
				{	
					echo "No records were changed";	
				}
			}
		}
		

		$sqlID = "SELECT Max(OrderItemID) AS nextID FROM OrderItem";
		if(!$result = mysqli_query($con, $sqlID))
		{
			die('Error in quering the database '. mysqli_error($con));
		}
		$row = mysqli_fetch_assoc($result);
		$OrderItemID = $row['nextID'] + 1;

		
		$sql = "Insert into OrderItem(OrderItemID, Quantity, DrugID,OrderID) 
					VALUES ($OrderItemID,$Quantity,$DrugID,$OrderID)";
		
		if (!mysqli_query($con, $sql) )
		{	
			die('Error adding to database '. mysqli_error($con));
		}
		else
		{
			if (mysqli_affected_rows($con) != 0 )
			{	
			}
			else
			{	
				echo "No records were changed";	
			}
		}
	}
	
	mysqli_close($con);
?>

<form action="ManualReorderOfDrugs.html.php" method="post" >
	<input type ="submit" value="Return to Previuous Screen">
	
<style>
	.RightJustified {
		text-align:right;
	}
	.LeftJustified {
		text-align: left;
	}
	.center {
		text-align: center;
	}
</style>
<body>

<?php
	include '../db.inc.php';
	
	$sqlID = "SELECT * FROM Supplier";
		if(!$result = mysqli_query($con, $sqlID))
		{
			die('Error in quering the database ' . mysqli_error($con));
		}
	$row = mysqli_fetch_assoc($result);
?>
	
	
<pre class="RightJustified">Primo Pharmacy,
High Street,
Carlow
<?php echo date("Y-m-d");?>
</pre>
	
<pre class="LeftJustified"><?php echo $row['Name']; ?>,
<?php echo $row['Street']; ?>,
<?php echo $row['Town']; ?>,
<?php echo $row['Country']; ?>
</pre>
	
<p class="center"> Order Number : <?php echo $OrderID; ?></p>
	
	
<p>Please supply the following drugs:</p>
	
<table cellpadding="17">
            <thead>
				<tr>
					<th>Brand Name</th>
					<th>Quantity</th>
					<th>Strength</th>
                    <th>Your Drug Code</th>
					<th>Price</th>
				</tr>
            </thead>
			 <tbody>
			 <?php
				 include '../db.inc.php';
					$Sqltest ="SELECT Drug.* , OrderItem.* FROM Drug 
							   INNER JOIN OrderItem on (OrderItem.DrugID = Drug.DrugID)
							   WHERE Drug.SupplierID = $SupplierID AND OrderItem.OrderID = $OrderID";
				 //$Sql = "SELECT OrderItem.Quantity ,Drug.CostPrice From Drug INNER JOIN OrderItem ON(OrderItem.DrugID = Drug.DrugID)";
				 
				 if(!$result = mysqli_query($con, $Sqltest))
				 {
					 die('Error in quering the database '. mysqli_error($con));
				 }
				 
				 
				 $total = 0;
				while ( $row = mysqli_fetch_array($result) )
				{
					$GenericName = $row['GenericName'];
					$Quantity = $row['Quantity'];
					$Strength = $row['Strength'];
					$DrugID = $row['DrugID'];
					$CostPrice = $row['CostPrice'];
					
					$TotalCost = $TotalCost + ($Quantity * $CostPrice);
			?>
			 <tr>
					<td class="center"><?php echo $GenericName; ?></td>
					<td class="center"><?php echo $Quantity; ?></td>
				 	<td class="center"><?php echo $Strength; ?></td>
					<td class="center"><?php echo $DrugID; ?></td>
					<td class="center"><?php echo $CostPrice; ?></td>
				</tr>
			<?php }?> 
			</tbody>
		</table>
	
<p class="LeftJustified">Total Cost: <?php echo $TotalCost; ?> </p>	