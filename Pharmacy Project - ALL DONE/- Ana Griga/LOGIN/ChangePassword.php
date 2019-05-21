<?php
include 'db.inc.php';
//Initialize the session
session_start();
if(isset($_SESSION['user']))
{
	if(isset($_POST['Password']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword']))
	$old = $_POST['Password'];
	$new = $_POST['newPassword'];
	$confirm = $_POST['confirmPassword'];

	$user = $_SESSION['user'];
	
	$sql = "SELECT * FROM LogIn WHERE UserId = '$user' AND Password = '$_POST[Password]'";
	
	if(!mysqli_query($con, $sql))
		echo "Error in my query".mysqli_error($con);
	else
	{
		if(mysqli_affected_rows($con)==0)
		{
			buildPage($old, $new, $confirm);
			echo "Old password incorrect";
		}
		else
		{
			if($_POST['newPassword'] != $_POST['confirmPassword'])
			{
				buildPage($old, $new, $confirm);
				echo "New password do not match.Try again ";
			}
			else
			{
				$sql = "UPDATE LogIn SET Password = '$_POST[newPassword]' WHERE UserId = '$user'";
				if(!mysqli_query($con, $sql))
					echo "Error in Update Query".mysqli_error($con);
				else
				{
					if(mysqli_affected_rows($con)==0)
					{
						buildPage($old, $new, $confirm);
						echo "No changes made";
					}
					else
					{
						echo "Congratulation, your password was changed";
						session_destroy();
					}
				}
			}
		}
	}
}
else
{
echo"You must be login to see this page";
}
function buildPage($o, $n, $c)
{
	include 'ChangePassword.html.php';
}
mysqli_close($con)
?>
	
	
	
	
	
	
	
	
	
	
	
	