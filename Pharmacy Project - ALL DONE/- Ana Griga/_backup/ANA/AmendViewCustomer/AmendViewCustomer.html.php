<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Amend/ View Customer Unit-->

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

<script>
	function showalert(type)
		{	
		document.getElementById(type).style.display = "block";		
		setTimeout(function() 	{document.getElementById(type).style.display = "none";},4000);		
		}
		
	function hidealert(type)
		{	
			setTimeout(function() {document.getElementById(type).style.display = "none";},1);			
		}
			
    function togNav() 
        {		
            if (document.getElementById("mySidenav").style.width == "40px") 
				{	
                    document.getElementById("mySidenav").style.width = "250px";
					document.getElementById("main").style.marginLeft = "250px";
					document.getElementById("longnav").style.display = "block";
					document.getElementById("shortnav").style.display = "none";	
				} 
			else 
				{
					document.getElementById("mySidenav").style.width = "40px";
					document.getElementById("main").style.marginLeft = "40px";
					document.getElementById("longnav").style.display = "none";
					document.getElementById("shortnav").style.display = "block";
				}
        }
</script>	
</head>

<!--Left Menu-->
<body id="main" onload="confirmDOB()">
    <div id="mySidenav" class="sidenav">
        <a class="closebtn" onclick="togNav()">&#9776;</a>
			<div id="longnav">
				<a href="http://pharmacy.candept.com/pharmacy/index.html#">Customer</a>
				<a href="http://pharmacy.candept.com/pharmacy/index.html#">Drugs</a>
				<a href="http://pharmacy.candept.com/pharmacy/index.html#">Doctors</a>
				<a href="http://pharmacy.candept.com/pharmacy/index.html#">Something I forgot</a>
			</div>
				<div id="shortnav">
					<a href="http://pharmacy.candept.com/pharmacy/index.html#"><img src="./index_files/icon1.png" alt="" width="32" height="32"></a>
					<a href="http://pharmacy.candept.com/pharmacy/index.html#"><img src="./index_files/icon2.png" alt="" width="32" height="32"></a>
					<a href="http://pharmacy.candept.com/pharmacy/index.html#"><img src="./index_files/icon3.png" alt="" width="32" height="32"></a>	
				</div>
			</div>

<div id="maincontent">
<form class="boxshadow" action="AmendViewCustomer.php" onsubmit="return confirmCheck()" method="POST" >
	
        <h2>Amend/ View Customer</h2><br>
<script>
		
	function populate()
		{
			var sel = document.getElementById("listCustomer");
			var result;
			result = sel.options[sel.selectedIndex].value;
				var CustomerDetails = result.split(',');
			//	document.getElementById("display").innerHTML = "The details of the selected customer are: " + result;
				document.getElementById("amendid").value = CustomerDetails[0];
				document.getElementById("amendfirstname").value = CustomerDetails[1];
				document.getElementById("amendlastname").value = CustomerDetails[2];
				document.getElementById("amendaddress").value = CustomerDetails[3];
				document.getElementById("amenddateofbirth").value = CustomerDetails[4];
				document.getElementById("amendphonenumber").value = CustomerDetails[5];
		}

	function toggleLock()
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
					toggleLock();
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
	<fieldset>
	<p id="display"></p>
		<div class="form-row">	      
			<div class="form-group col4" id = "list">	
				<?php include 'listCustomer.php'; ?>		
			</div>
	
		    <div class="form-group col4" id = "list">
				<input class = "buttons" type = "button" value = "Amend Details" id = "amendViewbutton" onclick = "toggleLock()">
			</div>
		</div>
		
		<!--View Customer Id (we don not edit Customer Id)-->
		<div class="form-row">	      
			<div class="form-group col4">
				<label for="amendid">Customer Id</label>	
				<input type = "text" name = "amendid" id = "amendid" disabled>		
			</div>
		</div>
		
		<!--Amend/ View First Name-->		
		<div class="form-row">
			<div class="form-group col2">
				<label for="amendfirstname">First Name</label>
				<input type="text" class="form-control" name = "amendfirstname" id="amendfirstname" required placeholder="First Name" pattern="^[A-Za-z\s\-]+$" title= "Only letters allowed"
				autofocus>
			</div>
		
		<!--Amend/ View Last Name-->		
			<div class="form-group col2">
				<label for="amendlastname">Last Name</label>
				<input type="text" class="form-control" name = "amendlastname" id="amendlastname" required placeholder="Last Name" pattern="^[A-Za-z\s\-]+$" title = "Only letters allowed" autofocus>
			</div>
		</div>
			
		<!--Amend/ View Address-->	  
			<div class="form-group col1">
				<label for="amendaddress">Address</label>
				<input type="text" class="form-control" name = "amendaddress" id="amendaddress" required placeholder="Address" pattern ="[0-9A-Za-z\s]+" title = "Letters and numbers allowed but no commas allowed"autofocus>
			</div>

		<!--Amend/ View Date of Birth-->	
			<div class="form-row">
				<div class="form-group col2">
					<label for="amenddateofbirth">Date Of Birth</label>
					<input type="date" class="form-control" name = "amenddateofbirth" id="amenddateofbirth" required placeholder = "Date Of Birth" min='1899-01-01' max='2015-01-01'autofocus>
				</div>
	
		<!--Amend/ View Phone Number-->		
				<div class="form-group col2">
					<label for="amendphonenumber">Phone Number</label>
					<input type="text" class="form-control" name = "amendphonenumber" id="amendphonenumber" required placeholder = "Phone Number" pattern="^[0-9\s]*$" title = "Only numbers allowed"autofocus>
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
	
	