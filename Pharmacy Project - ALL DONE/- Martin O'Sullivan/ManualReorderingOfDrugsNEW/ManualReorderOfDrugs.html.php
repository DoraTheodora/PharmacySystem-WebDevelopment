<!DOCTYPE html>
<html>
<head>
	<title>Manual Drug Reorder</title>
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
	
	<h1>Manual Drug Reorder</h1>
	
	<script>
		function confirmCheck()
		{
			if(confirm('Are you sure you want to save these changes?') )
			{
				var table = document.getElementById('DrugTable');
				for (var r = 1; r < table.rows.length ;r++) 
				{
					var DrugID = table.rows[r].cells[8].innerHTML.slice(-2);
					var quantity = document.getElementById('OQuant'+r).value;
					var SupplierID = table.rows[r].cells[9].innerHTML.slice(-3,-2);
					
					console.log("SupplierID is : " + SupplierID + "\n");
					console.log("Drug is : " + DrugID + "\n");
					
					if(quantity == "")
						document.getElementById('Posting'+r).disabled = true;
					document.getElementById('Posting'+r).value = quantity + "_" + DrugID + "_" + SupplierID; // Arm hidden fields for posting
					document.getElementById('OQuant'+r).disabled = true; // Dont Post the entered quantities
    			}
				
				document.getElementById('listbox').disabled = true;
				return true;
			}
			else 
				return false;
		}
		
		function filter() 
		{
			var filter, table, tr, td, i, txtValue;
			
			filter = document.getElementById("listbox").options[document.getElementById("listbox").selectedIndex].value.toUpperCase();
			table = document.getElementById("DrugTable");
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
		
        <form class="boxshadow" action="letter.php" id="DrugForm" method="POST" onSubmit="return confirmCheck()" >
			
			<div class="col1" >
				<?php include 'listbox.php'; ?> <!-- Generates the drop down menu -->
			</div>
			
			
	<table id="DrugTable">
            <thead>
				<tr>
					<th>Supplier Name</th>
                    <th>Brand Name</th>
                    <th>Generic Name</th>
					<th>Strength</th>
                    <th>Drug Form</th>
                    <th>Cost Price</th>
                    <th>Quantity In Stock</th>
					<th>Quantity To Order</th>
				</tr>
            </thead>
			<tbody>

			<?php
					include '../db.inc.php';
					$result= mysqli_query($con,"SELECT Supplier.Name,Supplier.SupplierID ,Drug.DrugID ,Drug.BrandName ,Drug.GenericName,Drug.ReorderQuantity ,Drug.Strength ,Drug.Form ,Drug.CostPrice ,Drug.Quantity FROM Drug INNER JOIN Supplier ON (Drug.SupplierID = Supplier.SupplierID)");
					$i = 1;
					while ( $row = mysqli_fetch_array($result) )
					{
						$BrandName       = $row['BrandName'];
						$GenericName     = $row['GenericName'];
						$Strength        = $row['Strength'];
						$Form 		     = $row['Form'];
						$CostPrice       = $row['CostPrice'];
						$Quantity        = $row['Quantity'];
						$DrugID          = $row['DrugID'];
						$SupplierName    = $row['Name'];
						$ReorderQuantity = $row['ReorderQuantity'];
						$SupplierID       = $row['SupplierID'];
				?>
					<tr>
						<td class="centered"><?php echo $SupplierName ?></td>
						<td class="centered"><?php echo $BrandName ?></td>
						<td class="centered"><?php echo $GenericName ?></td>
						<td class="centered"><?php echo $Strength ?></td>
						<td class="centered"><?php echo $Form ?></td>
						<td class="centered"><?php echo $CostPrice ?></td>
						<td class="centered"><?php echo $Quantity ?></td>
						<td class="centered"><input type="number" id="<?php echo "OQuant" . $i; ?>" title="Numbers Only"></td>
						<td class="centered" hidden><input type="hidden" disabled> <?php echo $DrugID . $i; ?> </td>
						<td class="centered" hidden><input type="hidden" disabled> <?php echo $SupplierID . $i; ?> </td>
						<td class="centered" hidden><input type="hidden" id="<?php echo "Posting" . $i; ?>" name="<?php echo "Posting" . $i; ?>"></td>
					</tr>
				<?php $i++;}?>  
        </tbody>
		</table>
			
		<div class="buttons">
			<input type="Submit" value="Print"/>
		</div>
	</form>

	<br><br>
		
	<?php include '../../pharmacy/footer.php'; ?> <!-- Generates the footer -->
</body>
</html>