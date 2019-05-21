<!DOCTYPE html>
<!--Derry Brennan-->
<!--Tutor: Cathrine Moloney-->
<!-- 20/03/2019-->

<!--Add Drugs-->
<html>
   <head>
	   <!--Links-->
      <meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1252">
      <link rel="stylesheet" type="text/css" href="http://pharmacy.candept.com/pharmacy/css/styles.css">
      <!--css link-->
      <script type="text/javascript" src="confirmation.js"></script> <!--javascript link-->
      <script>
         function showalert()
         	{		
         	document.getElementById("alert").style.display = "block";
         	setTimeout(function() {document.getElementById("alert").style.display = "none";},1250);	
         	}
      </script>
      <style>@media print {#ghostery-purple-box {display:none !important}}</style>
	  <!--Script to populate the SuppId hidden box-->
      <script>
         function populateSuppId()
         {
         	var sel = document.getElementById("listSupp");
         	var result;
         	result = sel.options[sel.selectedIndex].value;
         	var suppDetails = result.split(',');
         	document.getElementById("SuppId").value = suppDetails[0]; 
         }
      </script>
      <script type="text/javascript" src="js/popUp.js"></script>
      <script type="text/javascript" src="js/alertbox.js"></script>
      <script type="text/javascript" src="js/leftnav.js"></script>
   </head>
   <body id="main">
	   <!--Including movey menu and alert boxes-->
      <?php include '../../pharmacy/leftnav.php'; ?>
      <?php include '../../pharmacy/alertbox.php'; ?>
      <div id="maincontent">
		  <!--Start of the form-->
         <form class="boxshadow" action="AddDrug.php" method ="Post" onsubmit="return confirmation()" >
            <h1>Add a drug</h1>
            <h3>Please Enter the Required Details</h3>
            <br><br><br>
            <div class="row">
               <div class="col2">
                  <label>Brand Name:</label>
                  <input  autocomplete="off" type="text" name="brandName" autofocus id="brandName" placeholder="Brand Name" required pattern="[A-Za-z\s]{2,30}" title="Must have at least 2 and no more than 30 Alpha characters only"/>
               </div>
               <div class="col2">
                  <label>Generic Name:</label>
                  <input  autocomplete="off" type="text" name="genericName" autofocus id="genericName" placeholder="genericName" required pattern="[A-Za-z\s]{2,30}" title="Must have at least 2 and no more than 30 Alpha characters only" />
               </div>
            </div>
            <div class="row">
               <div class="col1">
                  <?php //The include to the php file for the drop down list
                     include 'listSupp.php';
                     ?>	 
               </div>
            </div>
			 <!--The hidden input field for storing the supplier ID-->
            <input type='hidden' id='SuppId' name='SuppId'/>
            <div class="row">
               <div class="col2">
                  <label>Strength:</label>
                  <input   type="text" name="strength" placeholder="Pill mg, liquid ml, gas ml" required pattern="[0-9A-Za-z\s]{2,30}" title="Must have at least 2 and no more than 30 Alpha Numberic characters only" />
               </div>
               <div class="col2">
				    <!--Selection Box for the form factor of the drug-->
                  <label for="Form">Form:</label>
                  <select name="Form">
                     <option value="Pill">Pill</option>
                     <option value="Liquid">Liquid</option>
                     <option value="Gas">Gas</option>
                     <option value="Ointment">Ointment</option>
                     <option value="Patch">Patch</option>
                  </select>
               </div>
            </div>
            <div class="col1">
               <label>Usage Instructions:</label>
               <input   type="text" name="usageInstructions" placeholder="How to use"  required pattern="[0-9A-Za-z\s]{2,250}" title="Must have at least 2 and no more than 250 Alpha Numberic characters only"/>
            </div>
            <div class="col1">
               <label>Side effects:</label>
               <input   type="text" name="sideEffects" placeholder="Side effects" pattern="[0-9A-Za-z\s\,]{2,250}" title="Must have at least 2 and no more than 250 Alpha Numberic characters only"/>
            </div>
            <div class="row">
               <div class="col2">
                  <label>Cost Price:</label>
                  <input type="number" name="costPrice" placeholder ="Low Price, max 100" step = "any" min= "0.01" max ="100" placeholder = "Low price" />
               </div>
               <div class="col2">
                  <label>Retail Price:</label>
                  <input   type="number" name="retailPrice" step = "any" min="0.01" max="1000" placeholder = "High price, max 1000" />
               </div>
            </div>
            <div class="row">
               <div class="col2">
                  <label for="reorderlevel">Reorder Level</label>
                  <input type="number" min = "1" max = "300" placeholder="Max 300"  id="reorderlevel" name="reorderlevel">
               </div>
               <div class="col2">
                  <label for="reorderquantity">Reorder Quantity</label>
                  <input type="number" min = "1" max = "200" placeholder="Max 200"  id="reorderquantity" name="reorderquantity">
               </div>
            </div>
            <div class="buttons">
               <input type="submit" value="Commit Details" name="submit">
               <input type="reset" value="Clear Form" name="reset">
            </div>
         </form>
         <br><br>
         <br><br>
      </div>
	   <!--including the link to the group footer-->
      <?php include '../../pharmacy/footer.php'; ?>
   </body>
</html>