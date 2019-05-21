// JavaScript Document
// Derry Brennan
// C00231080
// Java Script Comfirmation

function confirmation()
{
	var input = confirm("Really Commit Details?"); //confirmation pop up
	
	if(input) //if true
		{
			"<?php include 'addDrug2.html' ?>";
		}
	else
		{
			return false;
		}
}