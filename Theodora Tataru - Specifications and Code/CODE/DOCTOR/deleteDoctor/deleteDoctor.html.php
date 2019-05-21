<!DOCTYPE html>
<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- February 2018 --->
<!--- FORM: Delete a doctor --->

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
	<?php
		echo '<script type="text/javascript">togNav();</script>'; 
		echo '<script type="text/javascript">showalert("green");</script>'; 
	?>
	<?php include '../../pharmacy/leftnav.php'; ?>
    <?php include '../../pharmacy/alertbox.php'; ?>
<!-- //////////////////////////////////////////////////////////////////// -->
<div id="maincontent">
	
<!-- Delete Doctor Form -->	
	<form class="boxshadow" action="deleteDoctor.php" onsubmit="return areYouSure()" method="POST" >
		<!-- THE LIST OF LAST NAME OF THE DOCTORS -->
		<h2> Select Doctor <h2>
		<br> 
		<!-- //////////////////////////////////////////////////////////////////// -->	
		<script>
			// populate the list with the details of the selected doctor
			function populateDoctors()
			{
				var myDoctors = document.getElementById("nameListBox");
				var theValues = myDoctors.options[myDoctors.selectedIndex].value;
				
				var doctorDetails = theValues.split('^');
				
				//document.getElementById("display").innerHTML = "The details of the selected person are: " + theValues;

				document.getElementById("ID").value = doctorDetails[0];
				document.getElementById("editFirstName").value = doctorDetails[1];
				document.getElementById("editLastName").value = doctorDetails[2];
				document.getElementById("editClinicAddress").value = doctorDetails[3];
				document.getElementById("editClinicPhoneNumber").value = doctorDetails[4];
				document.getElementById("editHomeAddress").value = doctorDetails[5];
				document.getElementById("editMobileNumber").value = doctorDetails[6];
				document.getElementById("editHomePhoneNumber").value = doctorDetails[7];
			}
			// confirm deletion
			function areYouSure()
			{
				var answer = confirm("Are you sure?");
				if(answer)	// if the answer is true
				{
					document.getElementById("ID").disabled = false;
					document.getElementById("editFirstName").disabled = false;
					document.getElementById("editLastName").disabled = false;
					document.getElementById("editClinicAddress").disabled = false;
					document.getElementById("editClinicAddressClinicPhoneNumber").disabled = false;
					document.getElementById("editClinicAddressHomeAddress").disabled = false;
					document.getElementById("editClinicAddressMobileNumber").disabled = false;
					document.getElementById("editClinicAddressHomePhoneNumber").disabled = false;
					return true;
				}
				else
				{
					populateDoctors();
					return false;
				}
			}
		</script>
		
		<br>
		<fieldset>
		<!-- Programmer checking! <p id="display"> </p> -->
		<div class="row">
			<div class="col4" id="inputState" >
				<?php include 'list.php'; ?>
			</div>
			<div class="col4 buttons" id="inputState">
				<input type="submit" value="Delete" name="submit" onclick="javascript:history.go(0)"/>
			</div>	
		</div>
		</fieldset>
		<fieldset>
		<!-- This field is separated in 4 columns: for styling porpuses -->
		<div class="row">
		<div class="col4">
			<label for="ID">Doctor's ID</label>																			
			<input type="text" name="ID" id="ID" placeholder="Doctor's Unique ID"  disabled>
		</div></div>
		<!-- This field is separated in 2 columns: first name and second name -->
		<div class="row">
			<!-- First Name of the Doctor -->
			<div class="col2">
				<label for="editFirstName">Doctor First Name</label>															
				<input type="text" name="editFirstName" id="editFirstName" placeholder="Doctor's First Name" pattern="^[A-Za-z\s\-]+$" disabled>
			</div>
			<!-- Last Name of the Doctor -->
			<div class="col2">
				<label for="editLastName">Doctor Last Name</label>
			    <input type="text" name="editLastName" id="editLastName" placeholder="Doctor's Last Name" pattern="^[A-Za-z\s\-]+$" disabled>
			</div>
		<!-- end columns -->
		</div>
		
		<!-- Clinic Address of the Doctor -->
		<div class="row">
			<div class="col1">
				<label for="editClinicAddress">Clinic Address</label>													
				<input type="text" name="editClinicAddress" id="editClinicAddress" placeholder="1234 Main St" pattern="^[A-Za-z0-9\s\-,\.]+$" disabled>
			</div>
		</div>
		<!-- Clinic Phone Number of the Doctor -->
		<div class="row">
			<div class="col2">
				<label for="editClinicPhoneNumber">Clinic Phone Number</label>															 
				<input type="text" name="editClinicPhoneNumber" id="editClinicPhoneNumber" placeholder="Clinic Phone Number"  title="Only digits allowed" pattern="^[0-9\s-()]+$" disabled>
			</div>
		</div>
		<!-- Home Address of the Doctor -->
		<div class="row">
			<div class="col1">
				<label for="editHomeAddress">Home Address</label>
				<input type="text" name="editHomeAddress" id="editHomeAddress" placeholder="1234 Main St"  pattern="^[A-Za-z0-9\s\-,\.]+$" disabled>
			</div>
		</div>
		<!-- PHONE NUMBERS -->
		<div class="row">
			<!-- Mobile Phone Number of the Doctor -->
			<div class="col2">
				<label for="editMobileNumber">Mobile Phone Number</label>
				<input type="text" name="editMobileNumber" id="editMobileNumber" placeholder="Mobile Phone Number" title="Only digits allowed" pattern="^[0-9\s-()]+$" disabled>
			</div>
			<!-- Home Phone Number of the Doctor -->
			<div class="col2">
				<label for="editHomePhoneNumber">Home Phone Number</label>
				<input type="text" name="editHomePhoneNumber" id="editHomePhoneNumber" placeholder="Home Phone Number" title="Only digits allowed" pattern="^[0-9\s-()]+$" disabled>
			</div>
		</div>
		</fieldset>
		<!-- Delete and Cancel Button-->
		<div class="buttons">
				<input class="delete" type="submit" value="Delete" name="submit"/>
				<input type="reset" value="Cancel"/>
		</div>
		<!-- End Buttons-->
	</form>
</div>	
	<?php include '../../pharmacy/footer.php'; ?>
</body>
</html>