<!DOCTYPE html>
<!-- Robert Kamenicky C00231987-->
<!-- Tutor: Catherine Moloney-->
<!-- Add New Stock Item-->

<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/robert.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">
    <title>Add a New Stock Item</title>

 	<script type="text/javascript" src="../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../pharmacy/js/alertbox.js"></script>
    <script type="text/javascript" src="../pharmacy/js/leftnav.js"></script>

</head>

<?php

define('submit', 'submit'); // taken from Stack Overflow defaul value of submit	

	function insert()
	{
	include 'db.inc.php';

	$maxStockID = "SELECT MAX(StockID) AS MaxID FROM Stock"; // select the higher Supplier ID
	$stockRow = mysqli_fetch_assoc(mysqli_query($con, $maxStockID));
	$primaryKey = $stockRow['MaxID'] + 1; // Increase Supplier ID by one 
	
	// Get the posted values from the form store it in SQL
	$sql = "Insert into Stock (StockID,Name,CostPrice,RetailPrice,ReOrderLevel,ReOrderQuantity,SupplierID) VALUES 
	($primaryKey,'$_POST[name]','$_POST[cPrice]','$_POST[rPrice]','$_POST[orderLevel]','$_POST[orderQuantity]','$_POST[supplierlist]')";

	if (!mysqli_query($con,$sql))
	{   
		die ("An Error in the SQL Query: ". mysqli_error($con));
	}
?>

    <?php
	mysqli_close($con);
	}
 
	// check if the submit (Add item) was pressed
	if(isset($_POST[submit]))
	{
		insert();	//Call the function for inserting data to SQL	
	 include '../pharmacy/alertbox.php';

	}
		?>

        <script>
            showalert('green', 'Data inserted Successfully.');
        </script>

        <body id="main">
			
<!-- Adding all the JavaScripts for Pop Up, Alerbox and Left Navigation-->
    <?php include '../pharmacy/leftnav.php'; ?>
    <?php include '../pharmacy/alertbox.php'; ?>

                    <div id="maincontent">

                        <form class="boxshadow" method="post" action="addnewstocknp.html.php" onsubmit="return confirmPopUp()">
                            <h2>Add a New Stock Item</h2>
                            <br>
                            <fieldset>
                                <div class="row2">
                                    <div class="col1">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" pattern="[a-zA-Z0-9\s]+" autofocus required />
                                    </div>

                                </div>
                                <div class="row2">
                                    <div class="col2">
                                        <label for="cPrice">Cost Price</label>
                                        <input type="text" name="cPrice" id="cPrice" pattern="((?:[0-9]{1,3}[\.,]?)*[\.,]?[0-9]+)\b" title="Number have to be positive" required/>
                                        <!-- https://regexr.com -->
                                    </div>
                                    <div class="col2">
                                        <label for="rPrice">Retail Price</label>
                                        <input type="text" name="rPrice" id="rPrice" pattern="((?:[0-9]{1,3}[\.,]?)*[\.,]?[0-9]+)\b" title="Number have to be positive" required />
                                        <!-- https://regexr.com -->
                                    </div>
                                    <div class="col2">
                                        <label for="orderLevel">Re-order Level</label>
                                        <input type="text" name="orderLevel" id="orderLevel" title="Number have to be positive integer e.g. 0,1,2,3..." pattern="\d+" />
                                    </div>
                                    <div class="col2">
                                        <label for="orderQuantity">Re-order Quantity</label>
                                        <input type="text" name="orderQuantity" id="orderQuantity" title="Number have to be positive integer e.g. 0,1,2,3..." pattern="\d+" />
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col1">
                                        <label for="suppliername">Supplier Name</label>
                                        <?php
									 include 'db.inc.php';
										$sql = "SELECT SupplierID, Name, Town, Country FROM Supplier";

									if (!$result = mysqli_query($con, $sql) )
									{
										die ("Error in querying the database: ".mysqli_error($con) );
									}
										
								// Suppliers Dropdown list
									echo "<select name ='supplierlist' id = 'supplierlist' >";

									while ( $row = mysqli_fetch_array($result) )
									{
										$id = $row['SupplierID'];
										$name = $row['Name'];
										$town = $row['Town'];
										$country = $row['Country'];

										echo "<option value='$id'>$name   -   $town, $country </option>";
									}	

									echo "</select>";

									mysqli_close($con);
							?>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="buttons">
                                <input type="submit" value="Add Item" name="submit" />
                                <input type="reset" value="Clear Form" name="reset" />
								<input type="reset" value="Cancel" name="cancel" onclick="location.href='listofproducts.php';" />
                            </div>
                        </form>

                       
                        <br>

                    </div>
                    <!-- END id="maincontent" -->
                   	<?php include '../pharmacy/footer.php'; ?>
        </body>

</html>