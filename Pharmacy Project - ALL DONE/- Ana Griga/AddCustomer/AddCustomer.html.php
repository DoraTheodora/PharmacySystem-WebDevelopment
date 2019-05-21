<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Add Customer Unit-->

<!DOCTYPE html>
<html>
<head>

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
<script>
function confirmDOB()
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
			
			document.getElementById("DateOfBirth").setAttribute("max", today);
		}
</script>

<body id="main" onload="confirmDOB()">
<div id="maincontent">
	
    <form class="boxshadow" action = "AddCustomer.php" method = "POST" onsubmit = "return confirmCheck()">
        <h2>Add New Customer</h2><br>
<fieldset>
	
		<!--Add First Name-->		
		<div class="row">
			<div class="col2">
				<label for="FirstName">*First Name</label>
				<input type="text" class="form-control" name = "FirstName" id="FirstName" required placeholder="First Name" pattern="[A-z\s.-]{2,}" required, title= "Input can include alphabet, spaces, dots, dashes and must be at least 2 if not more characaters in length" autofocus>
			</div>	
		<!--Add Last Name-->		
			<div class="col2">
				<label for="LastName">*Last Name</label>
				<input type="text" class="form-control" name = "LastName" id="LastName" required placeholder="Last Name" pattern="[A-z\s.-]{2,}" required title = "Input can include alphabet, spaces, dots, dashes and must be at least 2 if not more characaters in length" autofocus>
			</div>
		</div>
			
		<!--Add Address-->	  
			<div class="col1">
				<label for="Address">*Address</label>
				<input type="text" class="form-control" name = "Address" id="Address" required placeholder="Address" pattern="[A-z0-9\s.,]{5,}" required title = "Input can include alphabet, number,spaces, dots, commas and must be at least 5 if not more characaters in length" autofocus>
			</div>

		<!--Add Date of Birth-->	
			<div class="row">
				<div class="col2">
					<label for="DateOfBirth">*Date Of Birth</label>
					<input type="date" class="form-control" name = "DateOfBirth" id="DateOfBirth" required placeholder = "Date Of Birth" min='1899-01-01' max='2015-01-10'autofocus>
				</div>
				
		<!--Add Phone Number-->		
				<div class="col2">
					<label for="PhoneNumber">*Phone Number</label>
					<input type="text" class="form-control" name = "PhoneNumber" id="PhoneNumber" required placeholder = "Phone Number" pattern="[0-9\s-()]" title = "Input can include numbers, spaces, brackets, dashes"
					required>
				</div>
			</div>

</fieldset>  
	<div class="buttons">
		<input type="submit" value="Save" name="submit">
		<input type="reset" value="Clear" name="reset">
	</div>
 
 </form>
  
  	<div id="blue" class="alertbox blue">
	Information
		<span onclick="hidealert('blue');" >&times;</span>
	</div>
	
	<div id="red" class="alertbox red">
	Error adding into the database
		<span onclick="hidealert('red');">&times;</span>
	</div>
	
	<div id="green" class="alertbox green">
	Success adding into the database
		<span onclick="hidealert('green');">&times;</span>
	</div>

</div>	
</body>
</html>
	