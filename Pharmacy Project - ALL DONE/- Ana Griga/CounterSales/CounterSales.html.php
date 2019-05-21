<!DOCTYPE html>
<!--- Ana Griga C00231441--->
<!--- Tutor: Catherine Moloney--->
<!--- February 2018 --->
<!--- Counter Sales  --->
<html>
<head> <title>Counter Sales</title>

	<!-- CSS FILE--> <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
	<!--Font--><link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

	<!--Pop Up Alerts-->
	<script type="text/javascript" src="../../pharmacy/js/popUp.js"></script>
    <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
    <!-- Menu--><script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script>
    
</head>

<!-- //////////////////////////////////////////////////////////////////// -->
<!-- Left side menu -->
<body id="main" onload="confirmDOB()">
	<?php include '../../pharmacy/leftnav.php'; ?>
<!-- //////////////////////////////////////////////////////////////////// -->
<div id="maincontent">
<form class="boxshadow" action="CounterSales.php" method="POST" onsubmit="return confirmCheck()">

<script>
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
			
			document.getElementById("Date").setAttribute("max", today);
		}
function confirmCheck()
	{
		if(confirm("Are you sure ?"))
		{
			return true;
		}
		else
		{
			return false;	
		}
	}
	
function populateStock()
			{
				var stock = document.getElementById("StockList");
                var theValues = stock.options[stock.selectedIndex].value;
                
                var StockDetails = theValues.split('+');
                
             //   document.getElementById("display").innerHTML = "The details of stock are: " + theValues;
                

                document.getElementById("RetailPrice").value = StockDetails[1];
               
			}

	function subtotalFunction()
	{

		var Quantity = document.getElementById("Quantity").value;
		var Cost = document.getElementById("RetailPrice").value;
		
		document.getElementById("subtotal").value = parseFloat(Quantity * Cost);
		var subtotal = parseFloat(document.getElementById("subtotal").value);
		document.getElementById("total").value = subtotal + document.getElementById("total").value*1 ;
		// total
		return false;	
		
	}

</script>

        <h2>Counter Sales</h2><br>
<fieldset>
	<p id="display"></p>
	
		<div class='table boxshadow'>
				<table class=''> 
					<thead>
						<tr>
							<th class='Head'> Item Name <?php include 'StockList.php'; ?>	</th>
							
							<th class='Head'> Sale Price 
							<input type="number" class="form-control" name = "RetailPrice" id="RetailPrice" disabled >
							</th>
							<th class='Head'> Add Quantity 
							<input type="number" class="form-control" name = "Quantity" id="Quantity">
							</th>
							<th class='Head'> Subtotal 
							<input type="number" class="form-control" name = "subtotal" id="subtotal" disabled>
							</th>
	
						</tr>
					</thead>
				</table>
				</fieldset>
			<div class="col2">
				<label for="total">Total</label>
				<input type="number" class="form-control" name = "total" id="total" disabled>
			</div>
		</div>
	
	<!--Buttons-->
	<div class="buttons">
		<input type="button" value="Calculate" onclick="subtotalFunction()" name="submit">
		<input type="submit" value="Submit" name="submit">
		<input type="reset" value="Clear" name="reset">
	</div>
 
 </form>
</div>	
</body>
</html>
	
	
