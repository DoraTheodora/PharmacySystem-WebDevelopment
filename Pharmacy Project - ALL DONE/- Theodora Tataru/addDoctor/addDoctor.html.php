<!DOCTYPE html>
<!--- Theodora Tataru C00231174--->
<!--- Tutor: Catherine Moloney--->
<!--- February 2018 --->
<!--- FORM : Add A Doctor --->

<html>
<head> <title> pharmap </title>

	<!-- CSS FILE--> <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<!-- JAVA-SCRIPT FILE --> <script type="text/javascript" src="areYouSure.js"></script>
	<!--Font--><link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">
	
	<script type="text/javascript" src="../../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script>
</head>

<!-- //////////////////////////////////////////////////////////////////// -->
<!-- Left side menu -->
<body id="main">
	
	<?php 
		// MENU
		echo '<script type="text/javascript">togNav();</script>'; 
		// ALERTS POP UP
		echo '<script type="text/javascript">showalert("green");</script>'; 
	?>
	<!-- Menu -->
	<?php include '../../pharmacy/leftnav.php'; ?>
	<!-- Alert Boxes -->
    <?php include '../../pharmacy/alertbox.php'; ?>
	
<div id="maincontent">
<!-- Add Doctor Form -->	
	<form class="boxshadow" action="addDoctor.php" method="Post" onsubmit="return areYouSure()">
	
		<!-- HEATHER-->
		<h2> Add A New Doctor <h2>
		<br>
		<fieldset>
		<!-- This field is separated in 2 columns: first name and second name -->
		<div class="row">
			<!-- First Name of the Doctor -->
			<div class="col2">
				<label for="FirstName">*Doctor First Name</label>														<!-- WORD SPACE WORD etc-->								
				<input type="text"  name="FirstName" id="FirstName" placeholder="Doctor's First Name" pattern="^[A-Za-z\s\-]+$" 
				required autofocus title="Only alphabetic characteres allowed">
			</div>
			<!-- Last Name of the Doctor -->
			<div class="col2">
				<label for="LastName">*Doctor Last Name</label>
			    <input type="text"  name="LastName" id="LastName" placeholder="Doctor's Last Name" pattern="^[A-Za-z\s\-]+$" 
				required title="Only alphabetic characters, and dashes(-) allowed">
			</div>
		<!-- end columns -->
		</div>
		
		<!-- Clinic Address of the Doctor -->
		<div class="row">
			<div class="col1">
				<label for="ClinicAddress">*Clinic Address</label>													<!-- words, numbers, spaces, dash, comma, period-->
				<input type="text"  name="ClinicAddress" id="ClinicAddress" placeholder="1234 Main St" pattern="^[A-Za-z0-9\s\-,\.]+$" 
				title="Only alphabetic characters  ,  .  and - allowed" required>
			</div>
		</div>
		<!-- Clinic Phone Number of the Doctor -->
		<div class="row">
			<div class="col2">
				<label for="ClinicPhoneNumber">*Clinic Phone Number</label>													<!-- Numbers and spaces and + - () -->
				<input type="text"  name="ClinicPhoneNumber" id="ClinicPhoneNumber" placeholder="Clinic Phone Number" pattern="[0-9\s-()]"
				required title="Only digits allowed, - () . and +">
			</div>
		</div>
		<!-- Home Address of the Doctor -->
		<div class="row">
			<div class="col1">
				<label for="HomeAddress">Home Address</label>
				<input type="text"  name="HomeAddress" id="HomeAddress" placeholder="1234 Main St" pattern="^[A-Za-z0-9\s\-,\.]+$"
				title="Only alphabetic characters  ,  .  and - allowed">
			</div>
		</div>
		<!-- PHONE NUMBERS -->
		<div class="row">
			<!-- Mobile Phone Number of the Doctor -->
			<div class="col2">
				<label for="MobileNumber">Mobile Phone Number</label>
				<input type="text"  name="MobileNumber" id="MobileNumber" placeholder="Mobile Phone Number" pattern="[0-9\s-()]"
				title="Only digits allowed, - () . and +">
			</div>
			<!-- Home Phone Number of the Doctor -->
			<div class="col2">
				<label for="HomePhoneNumber">Home Phone Number</label>
				<input type="text"  name="HomePhoneNumber" id="HomePhoneNumber" placeholder="Home Phone Number" pattern="[0-9\s-()]"
				title="Only digits allowed, - () . and +">
			</div>
		</div>
		</fieldset>
		<!-- Submit and Reset Button-->
		<div class="buttons">
			<input type="submit" value="Save" name="submit">
			<input type="reset" value="Cancel" name="reset">
		</div>
		<!-- End Buttons-->
	</form>
</div>	
	<?php include '../../pharmacy/footer.php'; ?> 
</body>
</html>