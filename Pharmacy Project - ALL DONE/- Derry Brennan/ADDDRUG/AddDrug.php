<!--Derry Brennan-->
<!--Tutor: Cathrine Moloney-->
<!-- 20/03/2019-->

<!--AddDrugs.php-->

<script>
	function alertbox(colour)
	{
		document.getElementById(colour).style.display = "block";
		setTimeout(function() {document.getElementById(colour).style.display = "none";},5000);
	}
	function hidealert(colour)
	{
		setTimeout(function() {document.getElementById(colour).style.display = "none";},1);
	}
</script>
<?php
date_default_timezone_set("UTC"); // set date format
include 'addDrug2.html.php'; //include main page
include '../db.inc.php'; // incude database php
$id = "SELECT MAX(DrugId) as NewID FROM Drug"; //Auto incriment function of the primary key
if (!$answer = mysqli_query($con,$id))
{
	die ("An error occured getting Drug Id from the table: " . mysqli_error($con) );
}
$row =  mysqli_fetch_assoc($answer);
$newId = $row['NewID'] + 1;
//sql statement for insertion
$sql = "Insert into Drug (drugid,brandname,genericname,strength,form,usageinstructions, sideeffects,costprice,retailprice,reorderlevel,reorderquantity,supplierid)
VALUES ($newId,'$_POST[brandName]','$_POST[genericName]','$_POST[strength]','$_POST[Form]','$_POST[usageInstructions]','$_POST[sideEffects]','$_POST[costPrice]','$_POST[retailPrice]','$_POST[reorderlevel]','$_POST[reorderquantity]', '$_POST[SuppId]')";
if (!mysqli_query($con,$sql))
{
	//$message = ("An error occured writting to the drugs table: " . mysqli_error($con) ); //un comment for more info on errors
	echo "<script> alertbox('red','Drug was not added to the database'); </script>";
	
}
else
{
	echo "<script> alertbox('green','Drug Added Successfully'); </script>";
}
mysqli_close($con); 
?>

