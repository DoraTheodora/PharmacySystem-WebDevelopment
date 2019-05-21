<!DOCTYPE html>
<!--- Derry Brennan--->
<!--- Tutor: Catherine Moloney--->
<!--- 18/03/2019 --->
<!--- Amend A Drug --->

<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1252"><!--Setting content type and charset-->
      <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css"> <!-- css link --> 
	  <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet"><!--Font-->
      <script type="text/javascript" src="confirmation.js"></script> <!--javascript link-->
	  <script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script><!--left hand menu script-->
     
      <script>
         function populateSuppId()//populate the supplier drop down box
         {
         	var sel = document.getElementById("listSupp");
         	var result;
         	result = sel.options[sel.selectedIndex].value;//forming the string with the
         	var suppDetails = result.split(',');//Splitting the string on the ","
         	document.getElementById("SuppId").value = suppDetails[0]; //adding the supplier Id to the form
         }
      </script>
      <script type="text/javascript" src="../js/popUp.js"></script>
      <script type="text/javascript" src="../js/alertbox.js"></script><!--Script to call the alertboxes-->
      <script type="text/javascript" src="../js/leftnav.js"></script>
   </head>
<body id="main">
	<?php include '../../pharmacy/leftnav.php'; ?><!--Fancy movey menu-->
	<?php include '../../pharmacy/alertbox.php'; ?><!--Alert Boxes-->
<div id="maincontent">
	

 
<script>
function populate() // Main form population function
{
	var sel = document.getElementById("listDrug"); // Gets all the elements in the Drug table
	var result;
	result = sel.options[sel.selectedIndex].value; // And saves them as a string
	var drugDetails = result.split(','); // Splits the string on the ","
	document.getElementById("display").innerHTML = "The details of the selected drug are: " + drugDetails[1]; // This is a display string used if we want to print everything to the screen
	
	
	
	document.getElementById("amenddrugid").value = drugDetails[0]; // Puts everything in its place
	document.getElementById("amendbrandname").value = drugDetails[1];
	document.getElementById("amendgenericname").value = drugDetails[2];
	document.getElementById("amendstrength").value = drugDetails[3];
	document.getElementById("amendform").value = drugDetails[4];
	document.getElementById("amendusageinstructions").value = drugDetails[5];
	document.getElementById("amendsideeffects").value = drugDetails[6];
	document.getElementById("amendcostprice").value = drugDetails[7];
	document.getElementById("amendretailprice").value = drugDetails[8];
	document.getElementById("amendreorderlevel").value = drugDetails[9];
	document.getElementById("amendreorderquantity").value = drugDetails[10];
	document.getElementById("amendquantity").value = drugDetails[11];
}
function toggleLock() //Toggle lock function preventing detail alteration until amend button clicked
{
	if (document.getElementById("amendViewbutton").value == "Amend Details")
	{
		document.getElementById("amendbrandname").disabled = false;
		document.getElementById("amendgenericname").disabled = false;
		document.getElementById("amendstrength").disabled = false;
		document.getElementById("amendform").disabled = false;
		document.getElementById("amendusageinstructions").disabled = false;
		document.getElementById("amendsideeffects").disabled = false;
		document.getElementById("amendcostprice").disabled = false;
		document.getElementById("amendretailprice").disabled = false;
		document.getElementById("amendreorderlevel").disabled = false;
		document.getElementById("amendreorderquantity").disabled = false;
		document.getElementById("amendquantity").disabled = false;
		document.getElementById("amendViewbutton").value = "Amend Details";
	}
	else
	{
		document.getElementById("amendbrandname").disabled = true;
		document.getElementById("amendgenericname").disabled = true;
		document.getElementById("amendstrength").disabled = true;
		document.getElementById("amendform").disabled = true;
		document.getElementById("amendusageinstructions").disabled = true;
		document.getElementById("amendsideeffects").disabled = true;
		document.getElementById("amendcostprice").disabled = true;
		document.getElementById("amendretailprice").disabled = true;
		document.getElementById("amendreorderlevel").disabled = true;
		document.getElementById("amendreorderquantity").disabled = true;
		document.getElementById("amendquantity").disabled = true;
		document.getElementById("amendViewbutton").value = "Amend Details";
		}
}
function confirmCheck() // Confirmation check saves changes if confirmed, otherwise it does not save changes
{
	var response;
	response = confirm('Are you sure you want to save these changes?');
	if (response)
	{
		document.getElementById("amendbrandname").disabled = false;
		document.getElementById("amendgenericname").disabled = false;
		document.getElementById("amendstrength").disabled = false;
		document.getElementById("amendform").disabled = false;
		document.getElementById("amendusageinstructions").disabled = false;
		document.getElementById("amendsideeffects").disabled = false;
		document.getElementById("amendcostprice").disabled = false;
		document.getElementById("amendretailprice").disabled = false;
		document.getElementById("amendreorderlevel").disabled = false;
		document.getElementById("amendreorderquantity").disabled = false;
		document.getElementById("amendquantity").disabled = false;
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
<p hidden id = "display"> </p> <!--A print out of the drugs details, hidden for now-->


	
<form class="boxshadow" name="amendDrugForm" action="AmendDrug.php" method ="Post"  onsubmit="return confirmation()" ><!--Start of the amend drug form-->
<fieldset>
	<h1>Amend a drug</h1>
<br>
	<div class ="row"><!--css div to group elements within together-->
		<div class="col2"><!--css div stating this element should take up 50% of the row-->
	<?php include 'listDrug.php';?><!--calling the list drug drop down box-->
		</div>
		<div class="col2">
	<input type = "button" value = "Amend Details" id = "amendViewbutton" onclick = "toggleLock()">
		</div>
<br>
	<h3>Amend details below</h3>
<br>
</fieldset><!--Filed set to group the drug selection together-->
  <div class="row">
 	<div class="col3">
    	<label>Drug ID:</label>
	<input  autocomplete="off" type="text" name="amenddrugid" autofocus id="amenddrugid" placeholder="Drug ID" readonly/>
    </div>
    <div class="col3">
      	<label>Brand Name:</label>
	<input  autocomplete="off" type="text" name="amendbrandname" autofocus id="amendbrandname" placeholder="Brand Name" required pattern="[A-Za-z\s]{2,30}" title="Must have at least 2 and no more than 30 Alpha characters only" disabled/>
    </div>
    <div class="col3">
      	<label>Generic Name:</label>
	<input  autocomplete="off" type="text" name="amendgenericname" autofocus id="amendgenericname" placeholder="genericName" required pattern="[A-Za-z\s]{2,30}" title="Must have at least 2 and no more than 30 Alpha characters only" disabled/>
    </div>
  </div>
  <div class="row">
	  <div class="col3">
		<label>Strength:</label>
		<input   type="text" name="amendstrength"  id="amendstrength" placeholder="Pill mg, liquid ml, gas ml" required pattern="[0-9A-Za-z\s]{2,30}" title="Must have at least 2 and no more than 30 Alpha Numberic characters only" disabled/>
	  </div>
	  <div class="col3">
		<label for="Form">Form:</label>
		<select name="amendform" id="amendform" disabled >
                  <option value="Pill">Pill</option>
                  <option value="Liquid">Liquid</option>
                  <option value="Gas">Gas</option>
                  <option value="Ointment">Ointment</option>
                  <option value="Patch">Patch</option>
              </select>
	  </div>
	  <div class="col3">
		<label>Quantity:</label>
		<input   type="number" name="amendquantity"  id="amendquantity" min ="0" max = "1000000" disabled/>
	  </div>
	</div>
  <div class="col1">
   <label>Usage Instructions:</label>
	<input   type="text" name="amendusageinstructions" id="amendusageinstructions" placeholder="How to use"  required pattern="[0-9A-Za-z\s]{2,250}" title="Must have at least 2 and no more than 250 Alpha Numberic characters only" disabled/>
  </div>
	<div class="col1">
    <label>Side effects:</label>
	<input   type="text" name="amendsideeffects" id="amendsideeffects" placeholder="Side effects" pattern="[0-9A-Za-z\s]{2,250}" title="Must have at least 2 and no more than 250 Alpha Numberic characters only" disabled/>
  </div>
  <div class="row">
    <div class="col2">
     <label>Cost Price:</label>
	<input type="number" name="amendcostprice" id="amendcostprice" placeholder ="Low Price, max 100" step = "any" min= "0.01" max ="100" placeholder = "Low price" disabled/>
    </div>
    <div class="col2">
    <label>Retail Price:</label>
	<input   type="number" name="amendretailprice" id="amendretailprice" step = "any" min="0.01" max="1000" placeholder = "High price, max 1000" disabled/>
    </div>
  </div>
  <div class="row">
    <div class="col2">
      <label for="reorderlevel">Reorder Level</label>
      <input type="number" min = "1" max = "300" placeholder="Max 300"  id="amendreorderlevel" name="amendreorderlevel" disabled>
    </div>
    <div class="col2">
      <label for="reorderquantity">Reorder Quantity</label>
      <input type="number" min = "1" max = "200" placeholder="Max 200" id="amendreorderquantity" name="amendreorderquantity" disabled>
    </div>
  </div>
  
 
    
<div class="buttons">
  <input type="submit" value="Update" name="submit">
<input type="reset" value="Clear Form" name="reset">
  </div>
</form>
<br><br>
<br><br>
<br><br>
<?php include '../../pharmacy/footer.php'; ?> 
</body>
</html>
