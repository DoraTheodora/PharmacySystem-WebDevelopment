<!DOCTYPE html>
<!--- Group Work--->
<!--- Tutor: Catherine Moloney--->
<!--- March 2018 --->

<!--- Main Menu  --->

<scrip>

</scrip>

<nav id="mySidenav" class="sidenav">

	<a class="closebtn" onclick="togNav()">&#9776;</a>

	<div id="longnav">

		<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_collapsible_animate -->

		<button class="collapsible">Counter Sales</button>
		<div class="content">
			<ul>
				<li><a href="http://pharmacy.candept.com/Ana/CounterSales/CounterSales.html.php">Counter Sales</a>
				</li>
			</ul>
		</div>


		<button class="collapsible">Drugs</button>
		<div class="content">
			<ul>
				<li><a href="http://pharmacy.candept.com/Derry/DispenseDrug/dispenseDrugs.html.php">Dispense Drugs</a></li>
				<li><a href="http://pharmacy.candept.com/Martin/ManualReorderingOfDrugsNEW/ManualReorderOfDrugs.html.php">Manual ReOrder Of Drugs</a> </li>
				<li><a href="http://pharmacy.candept.com/Martin/RecieveDrugDeliveries/RecieveDrugs.html.php">Recieve Drug Deliveries</a> </li>
			</ul>
		</div>


		<button class="collapsible">File Maintenance</button>
		<div class="content">

			<ul>
				<li><a href="http://pharmacy.candept.com/Ana/AddCustomer/AddCustomer.html.php">Add New Customer</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Ana/AmendViewCustomer/AmendViewCustomer.html.php">Edit/View Customer</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Ana/DeleteCustomer/DeleteCustomer.html.php">Delete Customer</a> </li>
				<li><a href="http://pharmacy.candept.com/Dora/addDoctor/addDoctor.html.php">Add New Doctor</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Dora/editDeleteDoctor/editDoctor.html.php">Edit/View Doctor</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Dora/deleteDoctor/deleteDoctor.html.php">Delete Doctor</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Derry/AddDrug/addDrug2.html.php">Add New Drug</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Derry/AmendDrug/AmendDrug.html.php">Edit/View Drug</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Derry/DeleteDrug/DeleteDrug.html.php"> Delete Drug</a>
				</li>
			<li><a href="http://pharmacy.candept.com/Rob/addnewstocknp.html.php">Add New Stock Item</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Rob/listofproducts.php">Edit/View Stock Item</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Rob/listofproducts.php">Delete Stock Item</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Martin/addSupplier/addSupplier.html.php">Add New Supplier</a> </li>
				<li><a href="http://pharmacy.candept.com/Martin/AmendSupplier/amendSupplier.html.php">View/Edit A Supplier</a> </li>
				<li><a href="http://pharmacy.candept.com/Martin/deleteSupplier/deleteSupplier.html.php">Delete A Supplier</a> </li>
			</ul>


		</div>
		<button class="collapsible">Reports</button>
		<div class="content">

			<ul>
				<li><a href="http://pharmacy.candept.com/Dora/drugsReport/drugsReport.html.php">Drugs</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Derry/PrescriptionReport/PrescriptionReport.html.php">Prescriptions</a>
				</li>
				<li><a href="Your Link Here">Orders</a>
				</li>
				<li><a href="http://pharmacy.candept.com/Rob/customerprescriptionreport.php">Customer/Prescription</a>
				</li>
			</ul>

		</div>
		<button class="collapsible">Supplier Accounts</button>
		<div class="content">
			<ul>
				<li><a href="http://pharmacy.candept.com/Dora/newInvoice/invoice.html.php">New Invoice</a>
				</li>
				<li><a href="Your Link Here">New Payment</a> </li>
			</ul>
		</div>


		

		<script>
			var coll = document.getElementsByClassName( "collapsible" );
			var i;

			for ( i = 0; i < coll.length; i++ ) {
				coll[ i ].addEventListener( "click", function () {
					this.classList.toggle( "active" );
					var content = this.nextElementSibling;
					if ( content.style.maxHeight ) {
						content.style.maxHeight = null;
					} else {
						content.style.maxHeight = content.scrollHeight + "px";
					}
				} );
			}
		</script>

	
	</div> <!-- end long nav -->
	
	<div id="logocontainer">
		
		<a class="logout" href="http://pharmacy.candept.com/Ana/LogIn/WelcomePage.php">Logout</a>
		<a class="logout" href="http://pharmacy.candept.com/Ana/LogIn/ChangePassword.html.php">Change Pasword</a>
		<img class="logo" src="http://pharmacy.candept.com/pharmacy/images/pharmap-logo-dark-transparent.png" alt="logo">
	</div>


	<div id="shortnav" >
		
		<p class="textcollapsed">pharmap</p>
		
		
	</div>




</nav>