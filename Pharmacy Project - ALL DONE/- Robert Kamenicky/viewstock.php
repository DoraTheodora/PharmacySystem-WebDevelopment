<!DOCTYPE html>
<!-- Robert Kamenicky C00231987-->
<!-- Tutor: Catherine Moloney-->
<!--- View Stock Items  --->

<html lang="en">

<head>
    	<link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/robert.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">
    <title>Add a New Stock Item</title>

	<!-- Adding all the JavaScripts for Pop Up, Alerbox and Left Navigation-->
	<script type="text/javascript" src="../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../pharmacy/js/alertbox.js"></script>
    <script type="text/javascript" src="../pharmacy/js/leftnav.js"></script>
	
	<script type="text/javascript">
// Pop up message for update function	
	function update()
	{
		var result = confirm("Please confirm that the details are correct?");

		if (result) {
			window.location = 'update_stock_item.php';
		}
	}

</script>

</head>

    <body id="main">
		<!-- Left menu and Alerboxes-->
	<?php include '../pharmacy/leftnav.php'; ?>
    <?php include '../pharmacy/alertbox.php'; ?>

		<?php
		include 'db.inc.php';
		$prodID=$_GET['id'];	
		$prodID = trim(substr($_GET['id'],0, strrpos($_GET['id'],"-")));
		$data=mysqli_fetch_row(mysqli_query($con,"select * from Stock where StockID='$prodID'"));
			
		?>		
        <div id="maincontent">

            <form class="boxshadow" method="post" action="update_stock_item.php" onsubmit="update()">
                <h2>View Stock - Number: <?php echo $data['0']?></h2>
                <br> 
                <fieldset>
                    <div class="row2">
                        <div class="col1">
						<input  type="hidden" name="StockID" value="<?php echo $data['0'];?> " >
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" pattern="[a-zA-Z0-9\s]+" value="<?php echo $data['1']?>"  autofocus required disabled />
                        </div>

                    </div>
                    <div class="row2">
                        <div class="col2">
                            <label for="cPrice">Cost Price</label>
                            <input disabled type="text" name="cPrice" id="cPrice" pattern="((?:[0-9]{1,3}[\.,]?)*[\.,]?[0-9]+)\b" title="Number have to be positive" value="<?php echo $data['2']?>" required/> <!-- https://regexr.com -->
                        </div>

                        <div class="col2">
                            <label for="rPrice">Retail Price</label>
                            <input disabled type="text" name="rPrice" id="rPrice" pattern="((?:[0-9]{1,3}[\.,]?)*[\.,]?[0-9]+)\b" title="Number have to be positive" value="<?php echo $data['3']?>" required /> <!-- https://regexr.com -->
                        </div>
                        <div class="col2">
                            <label for="orderLevel">Re-order Level</label>
                            <input disabled type="text" name="orderLevel" id="orderLevel" title="Number have to be positive integer e.g. 0,1,2,3..." value="<?php echo $data['4']?>" pattern="\d+" />
                        </div>
                        <div class="col2">
                            <label for="orderQuantity">Re-order Quantity</label>
                            <input disabled type="text" name="orderQuantity" id="orderQuantity"  title="Number have to be positive integer e.g. 0,1,2,3..." value="<?php echo $data['5']?>" pattern="\d+"/>
                        </div>

                        <div class="col2">
                            <label for="QuantityinStock">Quantity in Stock</label>
                            <input disabled type="number" name="QuantityinStock" id="Quantity in Stock"  title="Number have to be positive integer e.g. 0,1,2,3..." value="<?php echo $data['6']?>" pattern="\d+"/>
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

									echo "<select name ='supplierlist' id = 'supplierlist' disabled>";

									while ( $row = mysqli_fetch_array($result) )
									{
										$id = $row['SupplierID'];
										$name = $row['Name'];
										$town = $row['Town'];
										$country = $row['Country'];

										//echo "<option value='$id'>$name   -   $town, $country </option>";
										
									
										if ($id==$data['8']) 
										{
											echo "<option value='$id' selected>$name   -   $town, $country </option>";
										}
										else{
											echo "<option value='$id'>$name   -   $town, $country </option>";
										}
									}	

									echo "</select>";

                                    mysqli_close($con);
							?>
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                <input type="button" value="Amend Details" name="Amend Details" id="AmendDetails" onclick = "toggleLock()"/>

                    <input id="update" onclick="return confirm('Please confirm that the details are correct' );" style="display:none;" type="submit" value="Update" name="submit" hidden/>
                   
					 <input type="reset" value="Cancel" name="cancel" onclick="location.href='listofproducts.php';" />
					
                </div>
            </form>
<script>
            function toggleLock()
    {
	if (document.getElementById("AmendDetails").value == "Amend Details")
	{
		document.getElementById("name").disabled = false;
		document.getElementById("cPrice").disabled = false;
		document.getElementById("rPrice").disabled = false;
		document.getElementById("orderLevel").disabled = false;
		document.getElementById("orderQuantity").disabled = false;
		document.getElementById("supplierlist").disabled = false;

        document.getElementById("update").style.display = 'block';
        document.getElementById("AmendDetails").style.display = 'none';

	}

    }
</script>     

        </div>
        <!-- END id="maincontent" -->
        <?php include '../pharmacy/footer.php'; ?>
    </body>

</html>