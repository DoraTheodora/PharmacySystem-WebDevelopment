<!---
Martin O'Sullivan
C00227188
Tutor : Catherine Moloney
-->

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">
	<script type="text/javascript" src="check.js"></script>

</head>

	<script type="text/javascript" src="../../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script>
	
	<h1>Amend Supplier</h1>
	
	<script> 
	function populate() /* Puts data Into Listbox */
	{
		var selection = document.getElementById("listbox");
		var result = selection.options[selection.selectedIndex].value;
		var result = result.split(',');
		
		document.getElementById("SupplierID").value = result[0];
		document.getElementById("Street").value = result[1];
		document.getElementById("Town").value = result[2];
		document.getElementById("Country").value = result[3];
		document.getElementById("SupplierName").value = result[4];
		document.getElementById("Email").value = result[5];
		document.getElementById("Website").value = result[6];
		document.getElementById("Telephone").value = result[7];
	}

	function toggleLock() // Lock and unlock entry boxes
	{	
		if(document.getElementById("amendViewbutton").value == "Amend Details")
		{
			document.getElementById("SupplierName").disabled = false;
			document.getElementById("Street").disabled = false;
			document.getElementById("Town").disabled = false;
			document.getElementById("Country").disabled = false;
			document.getElementById("Email").disabled = false;
			document.getElementById("Telephone").disabled = false;
			document.getElementById("Website").disabled = false;

			document.getElementById("amendViewbutton").value = "View Details";
		}
		else
		{
			document.getElementById("SupplierName").disabled = true;
			document.getElementById("Street").disabled = true;
			document.getElementById("Town").disabled = true;
			document.getElementById("Country").disabled = true;
			document.getElementById("Email").disabled = true;
			document.getElementById("Telephone").disabled = true;
			document.getElementById("Website").disabled = true;
			
			document.getElementById("amendViewbutton").value = "Amend Details";
		}
	}

	function first()
		{
			document.getElementById("amendViewbutton").value = "View Details";
			toggleLock();
			document.getElementById("SupplierID").disabled = true;
		}

	function confirmCheck()// User confirms changes
	{
		if(confirm('Are you sure you want to save these changes?'))
		{
			document.getElementById("SupplierID").disabled = false;
			document.getElementById("SupplierName").disabled = false;
			document.getElementById("Street").disabled = false;
			document.getElementById("Town").disabled = false;
			document.getElementById("Country").disabled = false;
			document.getElementById("Email").disabled = false;
			document.getElementById("Telephone").disabled = false;
			document.getElementById("Website").disabled = false;
			return true;
		}
		else 
		{
			populate();
			toggleLock();
			return false;
		}
	}
	</script>	

	

<body id="main" onload="first()">
	<?php include '../../pharmacy/leftnav.php'; ?>
 	<?php include '../../pharmacy/alertbox.php'; ?>
	
    <div id="maincontent">

        <br>
		
		<input type="button" value="Amend Details" id ="amendViewbutton" onclick="toggleLock()">
        <form class="boxshadow" action="amendView.php" method="Post" onSubmit="return confirmCheck()" >
			<div class="col1" >
				<?php include 'listbox.php'; ?>
			</div>
			

					
			<div class="row">
				<div class="col2">
					<label for="SupplierName">Supplier ID</label>
					<input type="text" id="SupplierID" name="SupplierID" placeholder="Supplier Name" required>
				</div>
				
				<div class="col2">
					<label for="SupplierName">Supplier Name</label>
					<input type="text" id="SupplierName" name="SupplierName" placeholder="Supplier Name" required>
				</div>
			</div>


            <div class="row">
                <div class="col3">
                    <label for="Street">Street</label>
                    <input type="text"  name="Street" id="Street" placeholder="1234 Main St" required>
                </div>

                <div class="col3">
                    <label for="Town">Town</label>
                    <input type="text" name="Town" id="Town" placeholder="Stockholm" title="Towns Cannot Contain Numbers Eg Carlow" required>
                </div>

                <div class="col3">
                    <label for="Country">Country</label>
                    <select id="Country" name="Country" >		
						<option value="Ireland">Ireland</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="France">France</option>
						<option value="Spain">Spain</option>
						<option value="Germany">Germany</option>
						<option value="Denmark">Denmark</option>
						<option value="Italy">Italy</option>
						<option value="Poland">Poland</option>
						<option value="Lithuania">Lithuania</option>
						<option value="Denmark">Denmark</option>
						<option value="Finaldn">Finland</option>
						<option value="United States Of America">United States Of America</option>
						<option value="Romania">Romania</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Other">Other</option>
				</select>

                </div>
            </div>
			
            <div class="row">
                <div class="col3">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" id="Email" placeholder="GDPR@itcarlow.ie" title="Emails must match an email format Eg GDPR@itcarlow.ie"  required>
                </div>

                <div class="col3">
                    <label for="Telephone">Telephone</label> 
                    <input type="text" name="Telephone" id="Telephone" placeholder="0872538107" title="Phone Numbers can only contain numbers,(,),+,- Eg (0504) 31222" pattern="[\d \)\(+]+" required>
                </div>
				
				<div class="col3">
                    <label for="Website">Website</label>
                    <input type="url" name="Website" id="Website" placeholder="itcarlow.ie" title="Websites must match the format of http://www.itcarlow.ie" required>
                </div>
            </div>

            <div class="buttons">
                <input type="Submit" value="Submit" name="Submit"/>
            </div>
        </form>

        <br><br>
		
	<?php include '../../pharmacy/footer.php'; ?>

</body>
	
	
	
	
	
</html>