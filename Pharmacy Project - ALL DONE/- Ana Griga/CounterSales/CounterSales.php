<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->

<?php 
include 'db.inc.php';//connection with the database	
//include 'CounterSales.html.php';

date_default_timezone_set('UTC');

$SaleID = "SELECT MAX(SaleID) AS ID FROM CounterSale";
$row = mysqli_fetch_assoc(mysqli_query($con, $SaleID));
$primaryKey = $row['ID'] + 1;

$sql = "INSERT INTO CounterSale (SaleID,Date) VALUES ($primaryKey,now() )"; // Now selects Todays Date
	 
if (!mysqli_query($con,$sql))
	{
		echo "Error doing Query" . mysqli_error($con);
	}
else
	{
		if (mysqli_affected_rows($con) != 0)
			{
				echo"Updated";
			}
		else
			{
				echo "No records were changed";
			}
	}
mysqli_close($con);
?>
