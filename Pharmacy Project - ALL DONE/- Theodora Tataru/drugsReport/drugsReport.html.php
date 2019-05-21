<!DOCTYPE html>
<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- February 2018 --->

<!--- Drugs Report  --->
<html>
<head> <title> pharmap </title>


	<!-- CSS FILE--> <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<!--Font--><link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

	<!--Pop Up Alerts-->
	<script type="text/javascript" src="../../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
    <!-- Menu--><script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script>
    
</head>

<!-- //////////////////////////////////////////////////////////////////// -->
<!-- Left side menu -->
<body id="main">
	<?php include '../../pharmacy/leftnav.php'; ?>
<!-- //////////////////////////////////////////////////////////////////// -->
<div id="maincontent">
	
<!-- Here is where the report will be shown -->	
	<form class="boxshadow" action="drugsReport.html.php" method="POST" name="reportForm">
		<h2> Drugs Report <h2>
		<br> 
		<input type="hidden" name="choice">
	</form>	
	<!-- Order Buttons-->
	<div class="buttons">
		<input type="button" id="BrandName" value="Sort By Brand Name" onclick="brandName()" title="Click here to sort the report by Brand Name">
		<input type="button" id="Name" value="Sort By Supplier Name" onclick="supplierName()" title="Click here to sort the report by Supplier Name">
	</div>
	<!--changing the order of the report-->
	<script>
		function brandName()
		{
			document.reportForm.choice.value="BrandName";
			document.reportForm.submit();
		}
		function supplierName()
		{
			document.reportForm.choice.value="Name";
			document.reportForm.submit();
		}
	</script>
	
	<?php
	$choice = "BrandName"; // choice by default
	
	if(ISSET($_POST['choice']))
	{
		$choice=$_POST['choice'];
	}
	// buttons being pressed
	if($choice=='Name')
	{
		?>
			<script>
				document.getElementById("BrandName").disabled=false;
				document.getElementById("Name").disabled=true;
			</script>
		<?php
		$sql = "SELECT Drug.BrandName, Drug.GenericName, Drug.Form, Drug.Strength, Drug.Quantity, Supplier.Name, count(PrescriptionItem.DrugID) as Dispensed 
				FROM((Drug INNER JOIN Supplier ON Drug.SupplierID=Supplier.SupplierID) 
				INNER JOIN PrescriptionItem ON Drug.DrugID = PrescriptionItem.DrugID) 
				WHERE Drug.DeletionFlag = 0 
				GROUP BY PrescriptionItem.DrugID 
				ORDER BY Supplier.Name ASC";

				
		include '../db.inc.php';
		produceReport($con,$sql);
	}
	else // if choice == SupplierName
	{
		?>
			<script>
				document.getElementById("BrandName").disabled=true;
				document.getElementById("Name").disabled=false;
			</script>
		<?php
		$sql = "SELECT Drug.BrandName, Drug.GenericName, Drug.Form, Drug.Strength, Drug.Quantity, Supplier.Name, count(PrescriptionItem.DrugID) as Dispensed  
				FROM((Drug INNER JOIN Supplier ON Drug.SupplierID=Supplier.SupplierID)
				INNER JOIN PrescriptionItem ON Drug.DrugID = PrescriptionItem.DrugID) 
				WHERE Drug.DeletionFlag = 0
				GROUP BY PrescriptionItem.DrugID 
				ORDER BY Drug.BrandName ASC";
				
		include '../db.inc.php';
		produceReport($con,$sql);
		
	}
	
	include '../db.inc.php';
	function produceReport($con,$sql)
	{
		include '../db.inc.php';
		$result = mysqli_query($con,$sql);
		// creating the table to be displayed
		echo "<div class='table boxshadow'>
				<table class=''> 
					<thead>
						<tr>
							<th class='Head'> Brand Name </th>
							<th class='Head'> Generic Name </th>
							<th class='Head'> Form </th>
							<th class='Head'> Strength </th>
							<th class='Head'> Quantity In Stock </th>
							<th class='Head'> Supplier Name </th>
							<th class='Head'> Numbers Of Timed Dispensed </th>
						</tr>
					</thead><tbody>";
		while($row=mysqli_fetch_array($result)) // display the data
		{
			echo "<tr>
					<td>".$row['BrandName']."</td>
					<td>".$row['GenericName']."</td>
					<td>".$row['Form']."</td>
					<td>".$row['Strength']."</td>
					<td>".$row['Quantity']."</td>
					<td>".$row['Name']."</td>
					<td>".$row['Dispensed']."</td>
				</tr>";
		}
		
		echo "</tbody></table></div>";
	}
	mysqli_close($con);
	?>
</div>	
	<?php include '../../pharmacy/footer.php'; ?>
</body>
</html>
