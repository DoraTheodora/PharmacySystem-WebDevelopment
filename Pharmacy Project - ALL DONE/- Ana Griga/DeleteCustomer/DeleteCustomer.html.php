<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Delete Customer Unit-->

<!DOCTYPE html>
<html>
<head>

	<!-- CSS FILE--> <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
    <!--Font--><link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!--Pop Up Alerts-->
    <script type="text/javascript" src="../../pharmacy/js/popUp.js"></script>
   <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
   <!-- Menu--><script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script>

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
<form class="boxshadow" action="DeleteCustomer.php" onsubmit="return confirmCheck()" method="POST" >

        <h2>Delete Customer</h2><br>
	<fieldset>
		<div class="row">
			<div class ="col3">
				<?php include 'deleteList.php';?>
			</div>
	
	<p id="display"></p>
		<div class="row">	      
			<div class="col4" id = "deleteList">			
			</div>
		<!--View Customer Id (we don not edit Customer Id)-->
		
<script>	
	function populate()
		{
			var sel = document.getElementById("deleteList");
			var result;
			result = sel.options[sel.selectedIndex].value;
				var CustomerDetails = result.split('+');
			//	document.getElementById("display").innerHTML = "The details of the selected customer are: " + result;
				document.getElementById("deleteid").value = CustomerDetails[0];
				document.getElementById("deletefirstname").value = CustomerDetails[1];
				document.getElementById("deletelastname").value = CustomerDetails[2];
				document.getElementById("deleteaddress").value = CustomerDetails[3];
				document.getElementById("deletedateofbirth").value = CustomerDetails[4];
				document.getElementById("deletephonenumber").value = CustomerDetails[5];
		}
	
	function confirmCheck()
		{
			var response;
			response = confirm('Are you sure you want to delete this Customer?');
			if (response)
				{
					
					document.getElementById("deleteid").disabled = false;
					document.getElementById("deletefirstname").disabled = false;
					document.getElementById("deletelastname").disabled = false;
					document.getElementById("deleteaddress").disabled = false;
					document.getElementById("deletedateofbirth").disabled = false;
					document.getElementById("deletephonenumber").disabled = false;
					return true;
				}
			else 
				{
					populate();
					return false;
				}
		}
</script>
	
		<div class="row">
			<div class ="col3">
				<label for="deleteid">Customer Id</label>	
				<input type = "text" name = "deleteid" id = "deleteid" disabled>		
			</div>
			

		<!--Delete First Name-->		
		<div class="row">
			<div class="col2">
				<label for="deletefirstname">First Name</label>
				<input type="text" class="form-control" name = "deletefirstname" id="deletefirstname">
			</div>
		
		<!--Delete Last Name-->		
			<div class="col2">
				<label for="deletelastname">Last Name</label>
				<input type="text" class="form-control" name = "deletelastname" id="deletelastname">
			</div>
		</div>
			
		<!--Delete Address-->	  
			<div class="col1">
				<label for="deleteaddress">Address</label>
				<input type="text" class="form-control" name = "deleteaddress" id="deleteaddress">
			</div>

		<!--Delete Date of Birth-->	
			<div class="row">
				<div class="col2">
					<label for="deletedateofbirth">Date Of Birth</label>
					<input type="date" class="form-control" name = "deletedateofbirth" id="deletedateofbirth">
				</div>
	
		<!--Delete Phone Number-->		
				<div class="col2">
					<label for="deletephonenumber">Phone Number</label>
					<input type="text" class="form-control" name = "deletephonenumber" id="deletephonenumber">
				</div>
			</div>
</fieldset>
	
	<!--Buttons-->
	<div class="buttons">
		<input type="submit" value="Delete the Record" name="submit">
	</div>
 
 </form>
  
	<!--Alert Boxes-->
  	<div id="blue" class="alertbox blue">
		Information
		<span onclick="hidealert('blue');" >&times;</span>
	</div>
	
	<div id="red" class="alertbox red">
		Error deleting from the database
		<span onclick="hidealert('red');">&times;</span>
	</div>
	
	<div id="green" class="alertbox green">
		Success deleting from the database
		<span onclick="hidealert('green');">&times;</span>
	</div>

</div>	
</body>
</html>
	
	