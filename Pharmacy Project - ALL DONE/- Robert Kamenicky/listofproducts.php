<!DOCTYPE html>
<!-- Robert Kamenicky C00231987-->
<!-- Tutor: Catherine Moloney-->
<!-- List of Products-->

<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/robert.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>List of Products</title>

	<!-- Adding all the JavaScripts for Pop Up, Alerbox and Left Navigation-->
	<script type="text/javascript" src="../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../pharmacy/js/alertbox.js"></script>
    <script type="text/javascript" src="../pharmacy/js/leftnav.js"></script>
	
</head>

<?php

define( 'submit', 'submit' ); // taken from Stack Overflow (Default state of submit)

		function deleteamend() {

			include 'db.inc.php';
			include '../pharmacy/alertbox.php';
			
			$id = $_GET['id']; // get the ID from URL
			$split = strpos( $id, "-" ); // split it on -
			$operation = substr( $id, $split + 1 ); // string after -
			$id = substr( $id, 0, $split ); // string before -
			$prodID = $_GET[ 'id' ]; // store the ID which will be processed
					
			$sql = "Select * From Stock WHERE StockID ='$id'";		
			
			if ( !$result = mysqli_query( $con, $sql ) )
				die( "Error :" . mysqli_error() );

			$row = mysqli_fetch_array( $result );

			$SSName = $row[ 1 ]; // Store the product name which to be deleted
			
//---------------------------- Delete -------------------------------------------
	if ($operation=="deleted")
	{
		if ( $row[ 'Quantity' ] == "0" ) 
		{ 
			$sql = "Update Stock SET DeletionFlag = 1 WHERE StockID='$prodID'";
			?>
				<script>
					showalert( 'green', <?php echo "\""."'". $SSName."'"." was successfully deleted!" . "\""?> );
				</script>
			<?php

			if ( !mysqli_query( $con, $sql ) )
				 die( "Error :" . mysqli_error() );
		} 

		else 
		{ 
			?>
			<script>
				showalert( 'red', <?php echo "\""."'". $SSName."'"." can not be deleted as stock is not zero!" . "\""?> );
			</script>
			<?php

		}  

	} // end of delete
//--------------------------- Update ------------------------------------------
	else if ($operation=="updated")
	{
		?>
				<script>
					showalert( 'green', <?php echo "\""."'". $SSName."'"." was successfully updated!" . "\""?> );
				</script>
		<?php
	}
			
		} // end deleteamend()
?>

<?php
if ( isset( $_REQUEST[ 'id' ] ) ) {
	deleteamend();
}

?>
	
<body id="main">

<?php include '../pharmacy/leftnav.php'; ?>
    <?php include '../pharmacy/alertbox.php'; ?>

	<div id="maincontent">
		<br>
		<h2>List of Products</h2>
		
		<br>
		<button style="margin:auto" type="button" onclick="location.href='addnewstocknp.html.php';" >Add New Stock Item</button> 
	
		
		<div class="table boxshadow">
			<table class="listofproducts">

				<thead>
					<tr>
						<th>Stock<br>ID</th>
						<th width="18%">Name</th>
						
						<th>Cost<br>Price</th>				
				
						<th >Quantity<br>in Stock</th>

						<th>Supplier<br>Name</th>
						<th></th>

					</tr>
				</thead>
				<tbody>

					<?php
					include 'db.inc.php';

					//$result = mysqli_query( $con, "SELECT * from Stock INNER JOIN Supplier ON (Stock.SupplierID = Supplier.SupplierID)  WHERE Stock.DeletionFlag = 0 " );
					$result = mysqli_query( $con, "SELECT * from Stock INNER JOIN Supplier ON (Stock.SupplierID = Supplier.SupplierID)  WHERE Stock.DeletionFlag = 0 ORDER BY Supplier.SupplierID");

					while ( $row = mysqli_fetch_array( $result ) ) {
						$StockID = $row[ 'StockID' ];
						$SName = $row[ 1 ];
						
						$CostPrice = $row[ 'CostPrice' ];
						$RetailPrice = $row[ 'RetailPrice' ];
						$Quantity =  $row[ 'Quantity' ];
						
						$ReOrderLevel = $row[ 'ReOrderLevel' ];
						$ReOrderQuantity = $row[ 'ReOrderQuantity' ];

						$SupplierID = $row[ 'SupplierID' ];
						$SupplierName = $row[ 'Name' ];
						?>
									
					<tr  > 
						<td class="centered" onclick="window.location='viewstock.php?id=<?php echo $StockID?>-view';" >
							<?php echo $StockID?>
						</td>
						<td onclick="window.location='viewstock.php?id=<?php echo $StockID?>-view'" >
							<?php echo $SName?>
						</td>
						
						<td onclick="window.location='viewstock.php?id=<?php echo $StockID?>-view';" class="centered">
							<?php echo $CostPrice?>
						</td>
						
						<td onclick="window.location='viewstock.php?id=<?php echo $StockID?>-view';" class="centered">
							<?php echo $Quantity?>
						</td>
						

						<td onclick="window.location='viewstock.php?id=<?php echo $StockID?>-view';">
							<?php echo $SupplierName?>
						</td>

						<td class="centered delete" >

						

							<!-- <a href="delete_stock_item.php?id=<?php echo $StockID?>"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-eye fa-lg"></i></a> -->
									

				 			<a title="Delete Product" href="listofproducts.php?id=<?php echo $StockID?>-deleted" onclick="return confirm('Are you sure you want to delete <?php echo $SName?>' );">
					<i class="fa fa-remove fa-lg"></i>
				</a> 
							
							
							
						
						</td>
					</tr>
						
							
						
					<?php }?>

				
					
				</tbody>
			</table>
			

							
			
		</div>


		
		

	

<br><br>
		

		
<script> 
	// Taken from https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_modal
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	  modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}
	
	function showmodal(StockID)
	{
		  modal.style.display = "block";
		
		
		document.getElementById("demo").innerHTML = 5 + 6;
	}
	
</script>
	
		<br><br><br>

	</div>
	<!-- END id="maincontent" -->
	

	<?php include '../pharmacy/footer.php'; ?>
	
</body>

</html>