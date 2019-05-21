<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Add Customer Unit-->

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

<!--Javascript Functions needed in the page-->
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
		function confirmCheck()
		{
			var response;
			response = confirm('Are you sure you want to save these changes?');
			if (response)
				{
					document.getElementById("FirstName").disabled = false;
					document.getElementById("LastName").disabled = false;
					document.getElementById("Address").disabled = false;
					document.getElementById("DateOfBirth").disabled = false;
					document.getElementById("PhoneNumber").disabled = false;
					return true;
				}
			else 
				{
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
			
			document.getElementById("DateOfBirth").setAttribute("max", today);
		}
</script>
</head>

<body id="main" onload="confirmDOB()">

    <div id="mySidenav" class="sidenav" >
        <a class="closebtn" onclick="togNav()">&#9776;</a>
		<div id="longnav">
			<a href="#">Customer</a>
			<a href="#">Drugs</a>
			<a href="#">Doctors</a>
			<a href="#">Something I forgot</a>
		</div>
		
		<div id="shortnav">
			<a href="#"><img src="images\icon1.png" alt="" width="32" height="32"></a>
			<a href="#"><img src="images\icon2.png" alt="" width="32" height="32"></a>
			<a href="#"><img src="images\icon3.png" alt="" width="32" height="32"></a>	
		</div>
		
    </div>

<div id="maincontent">
	
    <form class="boxshadow" action = "AddCustomer.php" method = "POST" onsubmit = "return confirmCheck()">
        <h2>Add New Customer</h2><br>
<fieldset>
	
		<!--Add First Name-->		
		<div class="form-row">
			<div class="form-group col2">
				<label for="FirstName">*First Name</label>
				<input type="text" class="form-control" name = "FirstName" id="FirstName" required placeholder="First Name" pattern="^[A-Za-z\s\-]+$" title= "Only letters allowed"
				autofocus>
			</div>
						
			
		<!--Add Last Name-->		
			<div class="form-group col2">
				<label for="LastName">*Last Name</label>
				<input type="text" class="form-control" name = "LastName" id="LastName" required placeholder="Last Name" pattern="^[A-Za-z\s\-]+$" title = "Only letters allowed" autofocus>
			</div>
		</div>
			
		<!--Add Address-->	  
			<div class="form-group col1">
				<label for="Address">Address</label>
				<input type="text" class="form-control" name = "Address" id="Address" placeholder="Address"  title = "Letters and numbers allowed but no commas allowed"autofocus>
			</div>

		<!--Add Date of Birth-->	
			<div class="form-row">
				<div class="form-group col2">
					<label for="DateOfBirth">*Date Of Birth</label>
					<input type="date" class="form-control" name = "DateOfBirth" id="DateOfBirth" required placeholder = "Date Of Birth" min='1899-01-01' max='2015-01-01'autofocus>
				</div>
				
		<!--Add Phone Number-->		
				<div class="form-group col2">
					<label for="PhoneNumber">*Phone Number</label>
					<input type="text" class="form-control" name = "PhoneNumber" id="PhoneNumber" required placeholder = "Phone Number" pattern="^[0-9\s]*$" title = "Only numbers allowed"autofocus>
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
	