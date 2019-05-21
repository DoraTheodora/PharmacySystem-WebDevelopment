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


    <body id="main">
        <?php 
	echo '<script type="text/javascript">togNav();</script>'; 
	echo '<script type="text/javascript">showalert("green");</script>'; 
?>


        <?php include 'leftnav.php'; ?>
        <?php include 'alertbox.php'; ?>

        <div id="maincontent">
			
			
          <form class="boxshadow">
        <h2>Form-H2</h2><br>
<fieldset>
	
<div class="row">
			
		<div class="col2">	
		<label for="drug">Brand Name</label>
       
        <input type="text" name="drug" id="drug" title="Name of the drug" autocomplete="on" placeholder="Effexor" />
		</div>	
						
			
		<div class="col2">
            <label for="generic">Generic Name</label>
            
            <input type="text" name="generic" id="generic" title="Generic name of the drug" placeholder="Venlafaxine" />

        </div>
			
</div>
	
<div class="row">	      
        <div class="col4">
            <label for="formType">Drug Form Type</label>

              <select name="formType">
                  <option value="Tablet">Tablet</option>
                  <option value="Capsule">Capsule</option>
                  <option value="Lotion">Lotion</option>
                  <option value="Cream">Cream</option>
                  <option value="Ointment">Ointment</option>
                  <option value="Patch">Patch</option>
              </select>

        </div>
	
	    <div class="col4">
            <label for="strenght">Strength in mg</label>
            <input type="number" name="strength" id="strength" title="Strength of medicine" placeholder="35"/>
        </div>
		
	 	<div class="col2">
            <label for="supplier">Supplier Name</label>
            <input type="text" name="supplier" id="supplier" title="GName Of Supplier" placeholder="Pfizer" />
        </div>	
</div>
	
<div class="row">	 
	    <div class="col2">
            <label for="usage">Usage Instructions</label>
            <textarea  rows="2" cols="50"  name="usage" id="usage" title="Drug Usage Instructions" placeholder="To be taken 30 minutes before bed. Avoid grapefruit while taking this medication."></textarea>

        </div>
	
	    <div class="col2">
            <label for="SideEffects">Side Effects </label>
            <textarea  rows="4" cols="50" name="SideEffects" id="SideEffects" title="Drug Side Effects"  placeholder="Nausea, Dry Mouth, Headaches, dizziness , fast heartbeat, chest pain,depression. This is not an exhaustive list. Check with your doctor immediately if any side effects begin to cause difficulty or concern" required></textarea>
        </div>	
</div>	
		
</fieldset>       
		
	

<fieldset>  
	<div class="row">
        <div class="col4">
            <label for="cPrice">Cost Price</label>

            <input type="number" name="cPrice" />

        </div>
		
		<div class="col4">
            <label for="rPrice">Retail Price</label>

            <input type="number" name="rPrice"  />

        </div>
		
		<div class="col4">
            <label for="orderLevel">Re-order level</label>

            <input type="number" name="orderLevel" />

        </div>
		
		<div class="col4">
            <label for="orderQuantity">Re-order quantity</label>

            <input type="number" name="orderQuantity" />
 
        </div>
	</div>
</fieldset>  
<div class="buttons">
  <input type="submit" value="Send Form" name="submit" />

  </div>

    </form>
			<br> There is an issue with the Alertbox at the moment it will duplicate the message everytime is called. You can pass your own message to it. <code><b>onclick="showalert('blue','Passed Message');</b></code>
            <br>            <br>
			
			         <input type="submit" value="Show alert box RED" name="submit" onclick="showalert('red','Passed Message Red');" />
            
                      <br>
            <input type="submit" value="Show alert box BLUE" name="submit" onclick="showalert('blue','Passed Message Blue');" />


            <br>
            <input type="submit" value="Show alert box GREEN" name="submit" onclick="showalert('green','Passed Message Green');" />
            <br>
			
			
			<div  class="table boxshadow">
	<table class="">
         
            <thead>
				<tr>
                    <th>Brand Name</th>
                    <th>Generic Name</th>
                    <th>Drug Form Type </th>
                    <th>Supplier Name</th>
                    <th>Strength in mg</th>
                    <th>Usage Information</th>
                    <th>Cost Price</th>
                    <th>Retail Price</th>
                    <th>Re-order level</th>
                    <th>Re-order quantity</th>
				</tr>
            </thead>
			 <tbody>
            <tr>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
            </tr>
            <tr>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
            </tr>
            <tr>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
            </tr>
            <tr>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
               <td>TableContent</td>
            </tr>
         </tbody>
      </table>
	</div>
			
			
			
			

 


        </div>
        <!-- END id="maincontent" -->
        <?php include 'footer.php'; ?>
    </body>


</html>