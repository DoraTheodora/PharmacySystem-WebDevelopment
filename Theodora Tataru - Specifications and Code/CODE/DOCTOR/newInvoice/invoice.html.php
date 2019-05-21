<!DOCTYPE html>
<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- March 2018 --->

<!--- New Invoice  --->
<html>
<head> <title>pharmap</title>

	<!-- CSS FILE--> <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<!--Font--><link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

	<!--Pop Up Alerts-->
	<script type="text/javascript" src="../../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
    <!-- Menu--><script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script>
</head>

<!-- //////////////////////////////////////////////////////////////////// -->
<!-- Left side menu -->
<body id="main" onload="date()">
    <?php 
		echo '<script type="text/javascript">togNav();</script>'; 
		echo '<script type="text/javascript">showalert("green");</script>'; 
	?>
	<?php include '../../pharmacy/leftnav.php'; ?>
    <?php include '../../pharmacy/alertbox.php'; ?>
	
<!-- //////////////////////////////////////////////////////////////////// -->
<div id="maincontent">
	
<!-- supplier list -->	
	<form class="boxshadow" action="newInvoice.php" onsubmit="return areYouSure()" method="POST" >
		<div>
			<h2> New Invoice <h2>
		</div> <br> 	
		<!-- Populate the suppliers address, for confirmation -->	
		<script>
			// populate the list of suppliers
			function populateSuppliers()
			{
				var mySuppliers = document.getElementById("nameListBox");
				var theValues = mySuppliers.options[mySuppliers.selectedIndex].value;
				
				var supplierDetails = theValues.split('^');
				
				//document.getElementById("display").innerHTML = "The details of the selected supplier are: " + theValues;
				
				document.getElementById("SupplierID").value = supplierDetails[0];
				document.getElementById("Street").value = supplierDetails[1];
				document.getElementById("Town").value = supplierDetails[2];
				document.getElementById("Country").value = supplierDetails[3];
			}
			
			// adding invoice confirmation 
			function areYouSure()
			{
				var answer = confirm("Are you sure?");
				if(answer)	
				{
					document.getElementById("SupplierID").disabled = false;
					document.getElementById("InvoiceID").disabled = false;
					
					return true;
				}
				else
				{
					return false;
				}
			}
			// Enable all fields to add the details of a new invoice, after the supplier had been selected,
			// disables the supplier list, enables the "add invoice" button
			function enableSecondForm()
			{
				if(document.getElementById("enableFields").value == "Confirm Supplier")
				{
					// calling the method to generate a new Invoice Number
					InvoiceIDNo = newPrimaryKey();
					document.getElementById("InvoiceID").value = InvoiceIDNo;
					document.getElementById("InvoiceID").disabled = true;
					// enable the form to be completed
					document.getElementById("SupplierReference").disabled = false;
					document.getElementById("IssueDate").disabled = false;
					document.getElementById("Amount").disabled = false;
					// enable the submit form button
					document.getElementById("addInvoice").disabled = false;
					// disable the supplier list
					document.getElementById("nameListBox").disabled = true;
					// disable the confirm supplier
					document.getElementById("enableFields").disabled = true;
				}
			}
			//The date of issue of the invoice cannot be in the future
			function date()
			{
				var today = new Date(); 
				var todaysDate = today.getDate();
				var todaysMonth = today.getMonth()+1; 
				var todaysYear = today.getFullYear();
				if(todaysDate<10)
					{
						todaysDate='0'+todaysDate;
					} 
				if(todaysMonth<10)
					{
						todaysMonth='0'+todaysMonth;
					} 
				today = todaysYear+'-'+todaysMonth+'-'+todaysDate;
				
				document.getElementById("IssueDate").setAttribute("max", today);
			}
			
			// pressing clear, the suplliers list unlocks, and the button to enable the second form enables as well
			// the for for adding an invoice is all disabled, including buttons
			function resetSupplierList()
			{
				// new Invoice Number
				document.getElementById("InvoiceID").disabled = true;
				document.getElementById("InvoiceID").value = "";
				// disable the "new invoice" form
				document.getElementById("SupplierReference").disabled = true;
				document.getElementById("IssueDate").disabled = true;
				document.getElementById("Amount").disabled = true;
				// disable the submit form button
				document.getElementById("addInvoice").disabled = true;
				// enable the confirm supplier
				document.getElementById("enableFields").disabled = false;
				// enble the drop list with suppliers
				document.getElementById("nameListBox").disabled = false;
			}
			// generaring a new PRIMARY KEY / New Invoice Number
			function newPrimaryKey()
			{
				<?php
				include '../db.inc.php';
				//incrementing the PRIMARY KEY using a php function
				$sqlID = "SELECT MAX(InvoiceID) AS MaxID FROM Invoice";
						
				if(!$result = mysqli_query($con, $sqlID))
				{
					die('Error in quering the database'.mysqli_error($con));
				}		
				$row = mysqli_fetch_assoc($result);
				$max = $row['MaxID'];
				$primaryKey = $max + 1;
				?>
				// assigning the new primarykey to the variable PrimaryKey
				primaryKey = <?php echo $primaryKey; ?>;
				return primaryKey;
				// end of INCREMENTING PRIMARY KEY FUNTION
			}
		</script>
		
		<fieldset>
		<!-- Programer's chack! <p id="display"> </p> -->
		<!--Selecting the Supplier -->
		<div class="row">
			<div class="col3">
				<h3>Select Supplier</h3> 
			</div>
			<br>
			<div class="col3" id="inputState">
				<?php include 'list.php'; ?>
			</div>
		</div>
		<!-- the fields that will be populated by the selected supplier -->
		<div class="row">
			<!-- Street -->
			<div class="col3">
				<label for="Street">Street</label>															
				<input type="text"  name="Street" id="Street" placeholder="Supplier's Street Address" disabled>
			</div>
			<!-- Town -->
			<div class="col3">
				<label for="Town">Town</label>
			    <input type="text" name="Town" id="Town" placeholder="Supplier's Town Address" disabled>
			</div>
			<!-- Country -->
			<div class="col3">
				<label for="Country">Country</label>
			    <input type="text" name="Country" id="Country" placeholder="Supplier's Country Of Address" disabled>
			</div>
			<!-- Submit and Reset Button-->
			<div class="buttons">
				<input type="button" value="Confirm Supplier" id="enableFields" onclick="enableSecondForm()"/>
				<input type="reset" id="enableAgain" value="Clear" onclick="resetSupplierList()"/>
			</div>
		</div>
		</fieldset>
		
		<!-- New Invoice Form-->
		<fieldset>
		<div class="row">
			<div <div class="col2">
				<h3>Enter Invoice Details</h3>
			</div>
		</div>
			<div class="row">
				<div class="col3">
					<label for="InvoiceID">Invoice Number</label>
					<input type="text" name="InvoiceID" id="InvoiceID" placeholder="Invoice Number" disabled>
				</div>
				<div class="col3">
					<label for="SupplierID">Supplier ID</label>
					<input type="text" name="SupplierID" id="SupplierID" placeholder="Supplier ID" disabled>
				</div>
				<div class="col3">
					<label for="SupplierReference">Supplier Reference</label>															 
					<input type="text" name="SupplierReference" id="SupplierReference" placeholder="Supplier's invoice reference" required disabled>
				</div>
			</div>
			<div class="row">
				<div class="col2">
					<label for="IssueDate">Date Of Invoice</label>
					<input type="date" name="IssueDate" id="IssueDate" placeholder="Date of Invoice" required disabled>
				</div>
			</div>
			<div class="row">	
				<div class="col2">
					<label for="Amount">Amount Of Invoice</label>
					<input type="text" name="Amount" id="Amount" placeholder="Amount Of Invoice" required pattern="^[0-9\.]+$" title="Only digits, and decimal points(.) allowed" disabled>
				</div>
			</div>
			<div class="buttons">
				<input type="submit" id="addInvoice" value="Add Invoice" name="submit" disabled=true/>
				<input type="reset" id="enableAgain" value="Clear" onclick="resetSupplierList()"/>
			</div>
		</div>
		</fieldset>
		</form>
</div> <br><br><br><br>
	<?php include '../../pharmacy/footer.php'; ?>
</body>
</html>