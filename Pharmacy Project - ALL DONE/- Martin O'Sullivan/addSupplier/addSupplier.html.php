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
	
	
<?php
	function addToDB()
	{
		include '../db.inc.php';
		
		$sqlID = "SELECT Max(SupplierID) AS nextID FROM Supplier";

		if(!$result = mysqli_query($con, $sqlID))
		{
			die('Error in quering the database'.mysqli_error($con));
		}

		$row = mysqli_fetch_assoc($result);

		$primaryKey = $row['nextID'] + 1;

		$sql = "Insert into Supplier(SupplierID, Street, Town, Country, Name, Email, WebSite,PhoneNumber) 
				VALUES ($primaryKey,'$_POST[Street]', '$_POST[Town]', '$_POST[Country]', '$_POST[SupplierName]', '$_POST[Email]',  '$_POST[Website]','$_POST[Telephone]')";

			if(!mysqli_query($con, $sql)) 
			{ 
				echo "<script> showalert('red','Error in query'); </script>"; 
			}
			else
			{
				 echo "<script> showalert('green','Sucessfully added supplier'); </script>"; 
			}

		mysqli_close($con);
	}
	
	if(isset($_POST[Submit]))
	{
		addToDB();	
	}
?>	
	<script type="text/javascript" src="../../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script>

<body id="main">
	<?php include '../../pharmacy/leftnav.php'; ?>
 	<?php include '../../pharmacy/alertbox.php'; ?>
    <div id="maincontent">
        <h1>Add Supplier</h1>

        <br>

        <form class="boxshadow" action="addSupplier.html.php" method="Post" onsubmit="return check()" >
            <div class=" col1">
                <label for="SupplierName">Supplier Name</label>
                <input type="text" class="form-control" id="SupplierName" name="SupplierName" placeholder="Supplier Name" required>
            </div>

            <div class="row">
                <div class="col3">
                    <label for="Street">Street</label>
                    <input type="text" class="form-control" name="Street" id="Street" placeholder="1234 Main St" required>
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
                    <input type="email" name="Email" placeholder="GDPR@itcarlow.ie" title="Emails must match an email format Eg GDPR@itcarlow.ie" id="Email" required>
                </div>

                <div class="col3">
                    <label for="Telephone">Telephone</label> 
                    <input type="text" name="Telephone" id="Telephone" placeholder="0872538107" title="Phone Numbers can only contain numbers,(,),+,- Eg (0504) 31222" pattern="[\d \)\(+]+" required>
                </div>
				
				<div class="col3">
                    <label for="Website">Website</label>
                    <input type="url" name="Website" placeholder="itcarlow.ie" id="Website" title="Websites must match the format of http://www.itcarlow.ie" required>
                </div>
            </div>

            <div class="buttons">
                <input type="Submit" value="Submit" name="Submit" />
                <input type="Reset" value="Clear" name="Reset" />
            </div>
        </form>

        <br><br>
		
			<div id="blue" class="alertbox blue">
		Information
		<span onclick="hidealert('blue');" >&times;</span>
	</div>
	
	<div id="red" class="alertbox red">
		The new entry, failed to be added into the database!
		<span onclick="hidealert('red');">&times;</span>
	</div>
	
	<div id="green" class="alertbox green">
		The new entry added successfuly! 
		<span onclick="hidealert('green');">&times;</span>
	</div>
		
	<div>
		<?php include '../../pharmacy/footer.php'; ?>
	</div>

</body>
</html>