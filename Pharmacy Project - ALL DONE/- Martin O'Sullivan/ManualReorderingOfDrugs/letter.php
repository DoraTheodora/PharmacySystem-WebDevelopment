
<?php
	include '../db.inc.php';



		$sqlID = "SELECT Max(OrderID) AS OID FROM OrderTable";
		if(!$result = mysqli_query($con, $sqlID))
		{
			die('Error in quering the database '. mysqli_error($con));
		}
		$row = mysqli_fetch_assoc($result);
		$OrderID = $row['OID'] + 1;
		

	foreach( $_POST as $Element ) 
	{
		echo "Element is : " . $Element . "<br>";
		$Quantity = substr($Element,0, strrpos($Element,"_")-3);
		$DrugID = substr($Element,strpos($Element,"_")+1, strrpos($Element,"_")-3);
		$DrugID = str_replace("_","",$DrugID);
		$SupplierID = substr($Element,strrpos($Element,"_")+1);
		echo "Quantity : " . $Quantity . " DrugID : " . $DrugID . " SupplierID " . $SupplierID . "<br>";
		

		$sqlID = "SELECT Max(OrderItemID) AS nextID FROM OrderItem";
		if(!$result = mysqli_query($con, $sqlID))
		{
			die('Error in quering the database '. mysqli_error($con));
		}
		$row = mysqli_fetch_assoc($result);
		$OrderItemID = $row['nextID'] + 1;


		
		
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
				echo mysqli_affected_rows($con)." record(s) updated <br>";
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
	
<table>
            <thead>
				<tr>
					<th>Quantity</th>
                    <th>Your Drug Code</th>
					<th>Price</th>
				</tr>
            </thead>
			 <tbody>
			 <?php
				 include '../db.inc.php';
				$Sqltest = "SELECT Drug.* From Drug INNER JOIN OrderItem ON(OrderItem.DrugID = Drug.DrugID)";
				 //$Sql = "SELECT OrderItem.Quantity ,Drug.CostPrice From Drug INNER JOIN OrderItem ON(OrderItem.DrugID = Drug.DrugID)";
				 
				 if(!$result = mysqli_query($con, $Sqltest))
				 {
					 die('Error in quering the database '. mysqli_error($con));
				 }
				 
				 
				 $total = 0;
				while ( $row = mysqli_fetch_array($result) )
				{
					$Quantity = $row['Quantity'];
					$DrugID = $row['DrugID'];
					$CostPrice = $row['CostPrice'];
			?>
			 <tr>
					<td class="center"><?php echo $Quantity; ?></td>
					<td class="center"><?php echo $DrugID; ?></td>
					<td class="center"><?php echo $CostPrice; ?></td>
				</tr>
			<?php }?> 
			</tbody>
		</table>
	
<b class="LeftJustified">Total Cost:</b>	
<b class="RightJustified"><?php echo $primaryKey; ?></b>