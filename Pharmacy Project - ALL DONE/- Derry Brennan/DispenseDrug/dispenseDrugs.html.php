<!DOCTYPE html>
<!--Derry Brennan-->
<!--Tutor: Cathrine Moloney-->
<!-- 20/03/2019-->

<!--Dispense Drugs-->

<html>
	<head>
		<title>Dispense Drugs</title>
		<!--links-->
		<meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1252"><!--Setting content type and charset-->
      	<link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css"> <!-- css link --> 
	  	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet"><!--Font-->
	 	<script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script><!--left hand menu script-->
		
		<script>
         function populateDocId()//populate the DocId hidden box
         {
         	var sel = document.getElementById("listDoc");
         	var result;
         	result = sel.options[sel.selectedIndex].value;//forming the string with the
         	var docDetails = result.split(',');//Splitting the string on the ","
         	document.getElementById("docId").value = docDetails[0]; //adding the doctor Id to the form
         }
         function populateCustId()//populate the CustId hidden Box
         {
         	var sel = document.getElementById("listCust");
         	var result;
         	result = sel.options[sel.selectedIndex].value;//forming the string with the
         	var custDetails = result.split(',');//Splitting the string on the ","
         	document.getElementById("custId").value = custDetails[0]; //adding the customer Id to the form
         }
      </script>
		
	</head>
<body id= "main">
	
		<!--including the fancy movey menu-->
		<?php include '../../pharmacy/leftnav.php';
		date_default_timezone_set('UTC'); ?>
	
	<div id="maincontent">
		<!--The Form where the drugs will be selected from-->
		<form class="boxshadow" action = "dispenseDrug.php" method="post" name ="doctorForm">
			<h2>Enter Doctor Name and prescription date</h2>
			<br><br>
			<div class ="row">
				<div class="col2">
					<label>Prescribing Doctor</label>
					<?php include 'listDoc.php' ?>
					</div>
				<div class="col2">
					<label>Customer</label>
					<?php include 'listCust.php' ?>
				</div>
			</div>
					<input  type ="hidden" name="docId" id="docId">
					<input  type ="hidden" name="custId" id="custId">
			<div class ="row">
				<div class="col1">
					<label> Prescription Date</label>
					<input type ="date" name="pdate" id="pdate">
				</div>
			</div>
			<div class="buttons">
               <input type="submit" value="Commit Details" name="submit">
               <input type="reset" value="Clear Form" name="reset">
            </div>
		</form>
		
		<form class="boxshadow" onsubmit="this.reset()" method="post" name ="drugForm">
			<h2>Drug Details</h2>
			<br><br>
			<div class ="row">
				<div class="col2">
					<label>Drug</label>
					<?php include 'listDrug.php' ?>
					</div>
				<div class="col2">
					<label>Size of Dose</label>
					<input text ="number" name="dose" id="dose" placeholder="(Tablets to be taken at a time)" />
				</div>
			</div>
			<div class ="row">
				<div class="col2">
					<label>Frequency of Dosage</label>
					<input text ="number" name="dosef" id="dosef" placeholder="(Times per day) "/>
					</div>
				<div class="col2">
					<label>Length of Doseage</label>
					<input text ="text" name="dosel" id="dosel" placeholder="(length in days) "/>
				</div>
			</div>
			<div class ="row">
				<div class="col1">
					<label>Doctor's Instructions</label>
					<input text ="text" name="docins" id="docins" placeholder="(e.g. with food) "/>
					</div>
			</div>
			   <div class="buttons">
               <input type="submit" value="Commit Details" name="submit">
               <input type="reset" value="Clear Form" name="reset">
            </div>
		</form>
		
		<form class="boxshadow" action="dispenseDrugs.html.php" method="post" name ="totalForm">
			<h2>Totals</h2>
			<br><br>
			<div class ="row">
				<div class="col1">
					<label>Total Cost Of Prescription</label>
					<input type ="Number" name="total" id="total">
				</div>
			</div>
			 <div class="buttons">
               <input type="submit" value="Commit Details" name="submit">
			</div>
		</form>
	</body>
</html>	
	