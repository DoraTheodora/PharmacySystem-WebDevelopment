<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<style>
	#DrugForm {
		width:auto;
	}
</style>

	<script type="text/javascript" src="../../pharmacy/js/popUp.js"></script> <!-- Javascript for a green or red sucess or fail notification -->
    <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script> <!-- Javascript for Left Navigation Menu-->
	
	<script>
		function populate()
		{ // $allText = "$OrderID,$Date,$SupplierName,$Street,$Town,$Country";
			var result =  document.getElementById("listbox").options[ document.getElementById("listbox").selectedIndex].value;
			var result = result.split(',');
			var text =  "OrderID : " + result[0] + " , Date Of Order : " + result[1] + "<br>" + result[2] + " <br>" + result[3] + " <br> " + result[4] + " <br> " + result[5];

			document.getElementById("display").innerHTML =	text;
		}
		
		function confirmCheck()
		{
			if(confirm('Are you sure you want to save these changes?') )
			{
				document.getElementById("listbox").disabled = true;
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function filter() 
		{
			var result =  document.getElementById("listbox").options[ document.getElementById("listbox").selectedIndex].value;
			var result = result.split(',');
			var text =  "OrderID : " + result[0] + "    Date Of Order : " + result[1] + " <br> " + result[2] + " <br>" + result[3] + " <br> " + result[4] + " <br> " + result[5];

			document.getElementById("display").innerHTML =	text;
			document.getElementById("OrderID").value =	result[0];
			
			
			var filter, table, tr, td, i, txtValue;
			
			filter = result[0].toUpperCase();
			table = document.getElementById("OrderTable");
			tr = table.getElementsByTagName("tr");

			for (i = 0; i < tr.length; i++) 
			{
				td = tr[i].getElementsByTagName("td")[0];
				if (td) 
				{
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) 
					{
						tr[i].style.display = "";
					}
					else 
					{
						tr[i].style.display = "none";
					}
				}
			}
			
			

			
			
			
		}
	</script>	

<body id="main">
	<?php include '../../pharmacy/leftnav.php'; ?> <!-- HTML for the Left Menu -->
 	<?php include '../../pharmacy/alertbox.php'; ?> <!-- HTML for popup -->
	
    <div id="maincontent">
        <br>
		
        <form class="boxshadow" action="RecieveDrug.php" id="DrugForm" method="POST" onSubmit="return confirmCheck()" >
			
			<div class="col1" >
				<?php include 'listbox.php'; ?> <!-- Generates the drop down menu -->
			</div>
			
			<p id="display"></p>
	<table id="OrderTable">
            <thead>
				<tr>
					<th>Order Number</th>
					<th>Brand Name</th>
                    <th>Form</th>
                    <th>Strength</th>
                    <th>Quantity Ordered</th>
                    <th>DrugID</th>
				</tr>
            </thead>
			<tbody>

			<?php
					include '../db.inc.php';
					$result= mysqli_query($con,"SELECT Drug.* , OrderItem.* FROM Drug 
												INNER JOIN OrderItem on (OrderItem.DrugID = Drug.DrugID)
												INNER JOIN Supplier  on (Drug.SupplierID = Supplier.SupplierID)");
					while ( $row = mysqli_fetch_array($result) )
					{
						$OrderNumber     = $row['OrderID'];
						$BrandName       = $row['BrandName'];
						$Strength        = $row['Strength'];
						$Form 		     = $row['Form'];
						$Quantity        = $row['Quantity'];
						$DrugID          = $row['DrugID'];
						$SupplierName    = $row['Name'];
				?>
					<tr>
						<td class="centered"><?php echo $OrderNumber ?></td> 
						<td class="centered"><?php echo $BrandName ?></td> 
						<td class="centered"><?php echo $Form ?></td>
						<td class="centered"><?php echo $Strength ?></td>
						<td class="centered"><?php echo $Quantity ?></td>
						<td class="centered"><?php echo $DrugID ?></td>
					</tr>
				<?php }?>  
        </tbody>
		</table>
			<input type="hidden" id="OrderID" name="OrderID" value="" >
		<br><br>	
		<div class="buttons">
			<input type="Submit" value="Confirm Order"/>
		</div>
	</form>

	<br><br>
		
	<?php include '../../pharmacy/footer.php'; ?> <!-- Generates the footer -->
</body>
</html>