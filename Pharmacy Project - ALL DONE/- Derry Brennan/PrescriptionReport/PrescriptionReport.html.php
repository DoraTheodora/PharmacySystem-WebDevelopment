<!DOCTYPE html>
<!--Derry Brennan-->
<!--Tutor: Cathrine Moloney-->
<!--19/03/2019-->
<!--PrescriptionReport.html.php-->
<!--Prescription Report-->
<html>
	<head> 
		<title>The Prescription Report</title>
		
		<!--links-->
		<meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1252"><!--Setting content type and charset-->
      	<link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css"> <!-- css link --> 
	  	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet"><!--Font-->
	 	<script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script><!--left hand menu script-->
	</head>
	
<body id="main">
	
	<!--including the fancy movey menu-->
	<?php include '../../pharmacy/leftnav.php'; 
	date_default_timezone_set('UTC'); ?>
	
	<div id="maincontent">
		<!--start of the form in which everything will be displayed-->
		<form class="boxshadow" action="PrescriptionReport.html.php" method="post" name ="reportForm">
			<h1> Prescription Reports </h1>
			<input type="hidden" name="choice">
		</form>
		
		<!--Many prescription buttons-->
		<div class = "buttons">
			<input type="button" id="date" value = "Sort by date" onclick = "date()" title ="Click for dates report"> 
			<input type="button" id="doctor" value = "Sort by Doctor" onclick ="doctor()" title="Click for Doctor report">
			<input type="button" id="customer" value="Sort by Customer" onclick="customer()" title="Click for Customer report">
		</div>
			
		<!--ordering functions-->
		<script>
			function date()
			{
				document.reportForm.choice.value="date";
				document.reportForm.submit();
			}
			function doctor()
			{
				document.reportForm.choice.value="doctor";
				document.reportForm.submit();
			}
			function customer()
			{
				document.reportForm.choice.value="customer";
				document.reportForm.submit();
			}
		</script>
		<!--Main logic of the report-->
		<?php
		$choice = "date"; //default choice as per spec
		if(isset($_POST['choice']))
		{
			$choice=$_POST['choice'];	
		}
		if($choice=='doctor')
		{
			?>
				<script>
					document.getElementById("date").disabled=false;
					document.getElementById("doctor").disabled=true;
					document.getElementById("customer").disabled=false;
				</script>
			<?php
			$sql= "SELECT Prescription.PrescriptionID, Prescription.Date, CONCAT_WS(' ',Customer.FirstName,Customer.LastName) AS CustName, Customer.Address, CONCAT_WS(' ',Doctor.FirstName,Doctor.LastName) AS DocName
			       FROM ((Prescription INNER JOIN Customer ON Prescription.CustomerID=Customer.CustomerID)
				   INNER JOIN Doctor ON Prescription.DoctorID=Doctor.DoctorID)
				   WHERE Prescription.DeletionFlag = 0
				   ORDER BY Doctor.LastName ASC";
				
			include'../db.inc.php';
			produceReport($con,$sql);
		}
		else if($choice=='customer')
		{
			?>
				<script>
					document.getElementById("date").disabled=false;
					document.getElementById("doctor").disabled=false;
					document.getElementById("customer").disabled=true;
				</script>
			<?php
			$sql= "SELECT Prescription.PrescriptionID, Prescription.Date, CONCAT_WS(' ',Customer.FirstName,Customer.LastName) AS CustName, Customer.Address, CONCAT_WS(' ',Doctor.FirstName,Doctor.LastName) AS DocName
			       FROM ((Prescription INNER JOIN Customer ON Prescription.CustomerID=Customer.CustomerID)
				   INNER JOIN Doctor ON Prescription.DoctorID=Doctor.DoctorID)
				   WHERE Prescription.DeletionFlag = 0
				   ORDER BY Customer.LastName ASC";
				
			include'../db.inc.php';
			produceReport($con,$sql);
		}
		else  // else the choice must be 'date'
		{
			?>
				<script>
					document.getElementById("date").disabled=true;
					document.getElementById("doctor").disabled=false;
					document.getElementById("customer").disabled=false;
				</script>
			<?php
			$sql= "SELECT Prescription.PrescriptionID, Prescription.Date, CONCAT_WS(' ',Customer.FirstName,Customer.LastName) AS CustName, Customer.Address, CONCAT_WS(' ',Doctor.FirstName,Doctor.LastName) AS DocName
			       FROM ((Prescription INNER JOIN Customer ON Prescription.CustomerID=Customer.CustomerID)
				   INNER JOIN Doctor ON Prescription.DoctorID=Doctor.DoctorID)
				   WHERE Prescription.DeletionFlag = 0
				   ORDER BY Prescription.Date DESC";
				
			include'../db.inc.php';
			produceReport($con,$sql);
		}
					
		include'../db.inc.php';
		function produceReport($con, $sql)
		{
			include'../db.inc.php';
			$result = mysqli_query($con,$sql);
			echo "<div class='table boxshadow'>
					<table class=''>
						<thead>
							<tr>
								<th class = 'Head'> Prescription Number </th>
								<th class = 'Head'> Date Dispensed </th>
								<th class = 'Head'> Customer's Name </th>
								<th class = 'Head'> Customer's Address </th>
								<th class = 'Head'> Doctor's Name </th>
							</tr>
						</thead>";
			while($row=mysqli_fetch_array($result)) // while there is data in the array, write it out
			{
				
				//setup dispaly for date
				$date = date_create($row['Date']);
				$FDate = date_format($date,"d/m/Y");
				
				echo "<tbody>
						<tr>
						<td>".$row['PrescriptionID']."</td>
						<td>".$FDate."</td>
						<td>".$row['CustName']."</td>
						<td>".$row['Address']."</td>
						<td>".$row['DocName']."</td>
						</tr>
					   </tbody>";
			}
			echo"</table></div>";
		}
		mysqli_close($con);
		?>
	</div>		
	<?php //include '../../pharmacy/footer.php'; ?>
	</body>
</html>