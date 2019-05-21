<!DOCTYPE html>
<!-- Robert Kamenicky C00231987-->
<!-- Tutor: Catherine Moloney-->

<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">
    <title>Add a New Stock Item</title>



    <script type="text/javascript" src="js/popUp.js"></script>
    <script type="text/javascript" src="js/alertbox.js"></script>
    <script type="text/javascript" src="js/leftnav.js"></script>

</head>

<?php
	
define('submit', 'submit'); // taken from Stack Overflow
	
	
	//var $submit="";
	
	function insert()
	{
	include 'db.inc.php';

	//echo "Post is " . $_POST['supplierlist'];
	//echo "<h2>The details sent down are: </h2>";

	   
	//echo "Name is: ".$_POST['name']."<br>";
	//echo "Description is: ".$_POST['description']."<br>";

	$maxStockID = "SELECT MAX(StockID) AS MaxID FROM stock";
	$stockRow = mysqli_fetch_assoc(mysqli_query($con, $maxStockID));
	$primaryKey = $stockRow['MaxID'] + 1;

	//$sqlSupplierID = "SELECT SupplierID FROM supplier";

	$sql = "Insert into stock (StockID,Name,Description,CostPrice,RetailPrice,ReOrderLevel,ReOrderQuantity,SupplierStockCode,SupplierID) VALUES 
	($primaryKey,'$_POST[name]','$_POST[description]','$_POST[cPrice]','$_POST[rPrice]','$_POST[orderLevel]','$_POST[orderQuantity]','$_POST[supplierscode]','$_POST[supplierlist]')";
	
	echo "<script> showalert togNav(); </script>"; // display the green confirmation box NOT WORKING ----------------------------------------------------------	
		
	if (!mysqli_query($con,$sql))
	{   
		die ("An Error in the SQL Query: ". mysqli_error($con));
	}

	//echo "<br>A record has been added for ".$_POST['name']." ".$_POST['description'].".";

	mysqli_close($con);
	}
	
	if(isset($_POST[submit]))
	{
		insert();	
	}	
	
?>

    <body id="main">
        <?php 
	echo '<script type="text/javascript">togNav();</script>'; 
	echo '<script type="text/javascript">showalert("green");</script>'; 
?>


        <?php include 'leftnav.php'; ?>
        <?php include 'alertbox.php'; ?>

		<script type="text/javascript" src="js/popUp.js"></script>
    	<script type="text/javascript" src="js/alertbox.js"></script>
    	<script type="text/javascript" src="js/leftnav.js"></script>
		
        <div id="maincontent">


            <form class="boxshadow" method="post" action="addnewstocknp.html.php" onsubmit="return confirmPopUp()">
                <h2>Add a New Stock Item</h2>
                <br>
                <fieldset>
                    <div class="row2">
                        <div class="col1">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" autofocus required />
                        </div>
                        <div class="col1">
                            <label for="description">Description</label>
                            <textarea rows="5" cols="50" name="description" id="description" title="Description" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="row2">
                        <div class="col2">
                            <label for="cPrice">Cost Price</label>
                            <input type="number" name="cPrice" id="cPrice" required/>
                        </div>
                        <div class="col2">
                            <label for="rPrice">Retail Price</label>
                            <input type="number" name="rPrice" id="rPrice" required />
                        </div>
                        <div class="col2">
                            <label for="orderLevel">Re-order level</label>
                            <input type="number" name="orderLevel" id="orderLevel" required />
                        </div>
                        <div class="col2">
                            <label for="orderQuantity">Re-order quantity</label>
                            <input type="number" name="orderQuantity" id="orderQuantity" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col4">
                            <label for="supplierscode">Supplier’s Stock Code</label>
                            <input type="number" name="supplierscode" id="supplierscode" title="Supplier’s Stock Code" />
                        </div>
                        <div class="colauto">
                            <label for="suppliername">Supplier Name</label>
                            <?php
 include 'db.inc.php';
	$sql = "SELECT SupplierID, Name, Town, Country FROM supplier";

if (!$result = mysqli_query($con, $sql) )
{
	die ("Error in querying the database: ".mysqli_error($con) );
}

echo "<select name ='supplierlist' id = 'supplierlist' >";
	
while ( $row = mysqli_fetch_array($result) )
{
	$id = $row['SupplierID'];
	$name = $row['Name'];
	$town = $row['Town'];
	$country = $row['Country'];
	
	echo "<option value='$id'>$id. $name   -   $town, $country </option>";
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
                </div>
            </form>

            <input type="submit" value="Show alert box RED" name="submit" onclick="showalert('red','Passed Message Red');" />
            <br>

            <br>
            <input type="submit" value="Show alert box BLUE" name="submit" onclick="showalert('blue','Passed Message Blue');" />
            <br>

            <br>
            <input type="submit" value="Show alert box GREEN" name="submit" onclick="showalert('green','Passed Message Green');" />
            <br>

            <br>
            <br>
            <br>

        </div>
        <!-- END id="maincontent" -->
        <?php include 'footer.php'; ?>
    </body>


</html>