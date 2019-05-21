/*---Theodora Tataru--->
<!---C00231174--->
<!---Add Doctor--->
<!-- Confimation Function -->*/

function areYouSure()
{
	var answer = confirm("Are you sure?");

	
	if(answer)	// if the answer is true
	{
		"<?php include 'addDoctor.html.php' ?>";
	}
	else
	{
		"<?php include 'notSuccessful.html' ?>";
		return false;
	}
}