<!DOCTYPE html>
<!-- Robert Kamenicky C00231987-->
<!-- Tutor: Catherine Moloney-->
<!-- Customer Prescription Report -->



<html>
<head>
		<link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/robert.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Customer/Prescription Report</title>

	<!-- Adding all the JavaScripts for Pop Up, Alerbox and Left Navigation-->
	<script type="text/javascript" src="../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../pharmacy/js/alertbox.js"></script>
    <script type="text/javascript" src="../pharmacy/js/leftnav.js"></script>

</head>

<body id="main">
	
	<!-- Left menu and Alerboxes-->
	<?php include '../pharmacy/leftnav.php'; ?>
    <?php include '../pharmacy/alertbox.php'; ?>

	<div id="maincontent">
	
<!----------------------->	
	<br>
	
<h2>Customer/Prescription Report<h2>

	<br>
	<!--- Sort Buttons --->
		<div class="buttons">
		<input  disabled type="button" id="DateofDispensing" value="Date of Dispensing"  title="Sort by Date of Dispensing" onclick="location.href='customerprescriptionreport.php?sort=<?php echo 'DateofDispensing' ?>' "/>
		<input type="button" id="DoctorName"  value="Doctor Name" title="Sort by Doctors Name" onclick="location.href='customerprescriptionreport.php?sort=<?php echo 'DoctorName' ?>' "   />
		<input type="button" id="Cost" value="Cost" title="Sort by Cost" onclick="location.href='customerprescriptionreport.php?sort=<?php echo 'Cost' ?>' " />
		</div>
		
	<?php
		   /// ---Was the sort button pressed? ///
			if ( isset( $_REQUEST[ 'sort' ] ) )	
			{
				$id = $_GET[ 'sort' ]; //get the id on what criteria to sort
				
			// --- Sort by Date of Dispensing -- // 
				if ($id=='DateofDispensing')
				{
					$sql = "SELECT Prescription.Date, Doctor.LastName, Prescription.PrescriptionID, Prescription.TotalCost FROM (Prescription INNER JOIN Doctor ON Prescription.DoctorID = Doctor.DoctorID) ORDER BY Prescription.DateDispence ASC";
				?>
			<!-- Disable other 2 sort buttons -->
				<script>
					document.getElementById('DateofDispensing').disabled = true;
					document.getElementById("DoctorName").disabled = false;
					document.getElementById("Cost").disabled = false;
				</script>
				<?php
					include 'db.inc.php';
					produceReport($con,$sql);
				}
				
			// --- Sort by Doctor Name -- // 
				else if ($id=='DoctorName')
				{
				$sql = "SELECT Prescription.Date, Doctor.LastName, Prescription.PrescriptionID, Prescription.TotalCost FROM (Prescription INNER JOIN Doctor ON Prescription.DoctorID = Doctor.DoctorID) ORDER BY Doctor.LastName ASC";
					
				?>
	
			<!-- Disable other 2 sort buttons -->
				<script>
					document.getElementById('DateofDispensing').disabled = false;
					document.getElementById("DoctorName").disabled = true;
					document.getElementById("Cost").disabled = false;
				</script>
				<?php
	
				include 'db.inc.php';
				produceReport($con,$sql);					
				}
				
				// --- Sort by Total Cost -- //
				else 
				{		
					$sql = "SELECT Prescription.Date, Doctor.LastName, Prescription.PrescriptionID, Prescription.TotalCost FROM (Prescription INNER JOIN Doctor ON Prescription.DoctorID = Doctor.DoctorID) ORDER BY Prescription.TotalCost ASC";				
									?>
				<script>
					document.getElementById('DateofDispensing').disabled = false;
					document.getElementById("DoctorName").disabled = false;
					document.getElementById("Cost").disabled = true;
				</script>
				<?php
					

				include 'db.inc.php';
				produceReport($con,$sql);
				}			
						
			} 
 
		// --- Default Sort (no button was pressed)  --- //
			else //default sorting
			{			
				$sql = "SELECT Prescription.Date, Doctor.LastName, Prescription.PrescriptionID, Prescription.TotalCost FROM (Prescription INNER JOIN Doctor ON Prescription.DoctorID = Doctor.DoctorID) ORDER BY Prescription.DateDispence ASC";
				include 'db.inc.php';
				produceReport($con,$sql);
			}
	?>			   
			   
<?php
	// --- Method for sorting and displayiong the sort result  --- //					   
	function produceReport($con,$sql)
	{
		include 'db.inc.php';
		$result = mysqli_query($con,$sql);
		
		echo "<div class='table boxshadow'>
		
				<table class=''> 
					<thead>
						<tr>
							<th class='Head'> Date Prescription was dispensed </th>
							<th class='Head'> Doctor Name </th>
							<th class='Head'> Prescription id </th>
							<th class='Head'> Total Cost Prescription </th>

						</tr>
					</thead><tbody>";
		
		while($row=mysqli_fetch_array($result)) 
		{
			echo "
					<tr>
					<td>".$row['Date']."</td>
					<td>".$row['LastName']."</td>
					<td>".$row['PrescriptionID']."</td>
					<td>".$row['TotalCost']."</td>
					</tr>
				";
		}
		
		echo "</tbody></table></div>";
	}
	// mysqli_close($con);
		?>	
	
</div>	
	<?php include '../pharmacy/footer.php'; ?>
</body>
</html>
