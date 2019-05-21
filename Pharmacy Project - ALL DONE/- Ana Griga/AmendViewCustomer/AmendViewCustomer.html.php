<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Amend/ View Customer Unit-->

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

<div id="maincontent">
<form class="boxshadow" action="AmendViewCustomer.php" onsubmit="return confirmCheck()" method="POST" >
	
        <h2>Amend/ View Customer</h2><br>
<script>
		
	function populate()
		{
			var sel = document.getElementById("listCustomer");
			var result;
			result = sel.options[sel.selectedIndex].value;
				var CustomerDetails = result.split('+');
			//	document.getElementById("display").innerHTML = "The details of the selected customer are: " + result;
				document.getElementById("amendid").value = CustomerDetails[0];
				document.getElementById("amendfirstname").value = CustomerDetails[1];
				document.getElementById("amendlastname").value = CustomerDetails[2];
				document.getElementById("amendaddress").value = CustomerDetails[3];
				document.getElementById("amenddateofbirth").value = CustomerDetails[4];
				document.getElementById("amendphonenumber").value = CustomerDetails[5];
		}

	function amendFields()
		{
			if (document.getElementById("amendViewbutton").value == "Amend Details")
				{
					document.getElementById("amendfirstname").disabled = false;
					document.getElementById("amendlastname").disabled = false;
					document.getElementById("amendaddress").disabled = false;
					document.getElementById("amenddateofbirth").disabled = false;
					document.getElementById("amendphonenumber").disabled = false;
					document.getElementById("amendViewbutton").value = "View Details";
				}
			else
				{
					document.getElementById("amendfirstname").disabled = true;
					document.getElementById("amendlastname").disabled = true;
					document.getElementById("amendaddress").disabled = true;
					document.getElementById("amenddateofbirth").disabled = true;
					document.getElementById("amendphonenumber").disabled = true;
					document.getElementById("amendViewbutton").value = "Amend Details";
				}
		}

	function confirmCheck()
		{
			var response;
			response = confirm('Are you sure you want to save these changes?');
			if (response)
				{
					document.getElementById("amendid").disabled = false;
					document.getElementById("amendfirstname").disabled = false;
					document.getElementById("amendlastname").disabled = false;
					document.getElementById("amendaddress").disabled = false;
					document.getElementById("amenddateofbirth").disabled = false;
					document.getElementById("amendphonenumber").disabled = false;
					return true;
				}
			else 
				{
					populate();
					amendFields();
					return false;
				}
		}
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

			document.getElementById("amenddateofbirth").setAttribute("max", today);
		}

</script>
<body id="main" onload="confirmDOB()">
	<fieldset>
	<p id="display"></p>
		<div class="row">	      
			<div class="col4" id = "list">	
				<?php include 'listCustomer.php'; ?>		
			</div>
	
		    <div class="col4" id = "list">
				<input class = "buttons" type = "button" value ="Amend Details" id = "amendViewbutton" onclick = "amendFields()">
			</div>
		</div>
		
		<!--View Customer Id (don not edit Customer Id)-->
		<div class="row">	      
			<div class="col4">
				<label for="amendid">Customer Id</label>	
				<input type = "text" name = "amendid" id = "amendid" disabled>		
			</div>
		</div>
		
		<!--Amend/ View First Name-->		
		<div class="row">
			<div class="col2">
				<label for="amendfirstname">First Name</label>
				<input type="text" class="form-control" name = "amendfirstname" id="amendfirstname" required placeholder="First Name" pattern="^[A-Za-z\s\-]+$" title= "Only letters allowed"
				autofocus disabled>
			</div>
		
		<!--Amend/ View Last Name-->		
			<div class="col2">
				<label for="amendlastname">Last Name</label>
				<input type="text" class="form-control" name = "amendlastname" id="amendlastname" required placeholder="Last Name" pattern="^[A-Za-z\s\-]+$" title = "Only letters allowed" autofocus disabled>
			</div>
		</div>
			
		<!--Amend/ View Address-->	  
			<div class="col1">
				<label for="amendaddress">Address</label>
				<input type="text" class="form-control" name = "amendaddress" id="amendaddress" required placeholder="Address" pattern="[A-z0-9\s.,]{5,}" required title = "Input can include alphabet, number,spaces, dots, commas and must be at least 5 if not more characaters in length" autofocus disabled>
			</div>

		<!--Amend/ View Date of Birth-->	
			<div class="row">
				<div class="col2">
					<label for="amenddateofbirth">Date Of Birth</label>
					<input type="date" class="form-control" name = "amenddateofbirth" id="amenddateofbirth" required placeholder = "Date Of Birth" min='1899-01-01' max='2015-01-01'autofocus disabled>
				</div>
	
		<!--Amend/ View Phone Number-->		
				<div class="col2">
					<label for="amendphonenumber">Phone Number</label>
					<input type="text" class="form-control" name = "amendphonenumber" id="amendphonenumber" required placeholder = "Phone Number" pattern="[0-9\s-()]" title = "Input can include numbers, spaces, brackets, dashes"autofocus disabled>
				</div>
			</div>
</fieldset>
	
	<!--Buttons-->
	<div class="buttons">
		<input type="submit" value="Save" name="submit">
		<input type="reset" value="Clear" name="reset">
	</div>
 
 </form>
  
	<!--Alert Boxes-->
  	<div id="blue" class="alertbox blue">
		Information
		<span onclick="hidealert('blue');" >&times;</span>
	</div>
	
	<div id="red" class="alertbox red">
		Error editing into the database
		<span onclick="hidealert('red');">&times;</span>
	</div>
	
	<div id="green" class="alertbox green">
		Success editing into the database
		<span onclick="hidealert('green');">&times;</span>
	</div>

</div>	
</body>
</html>
	
	