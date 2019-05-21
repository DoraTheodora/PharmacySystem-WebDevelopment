<!--Ana Griga-->
<!--C00231441-->
<!--Project Pharmacy-->
<!--Tutor: Catherine Moloney-->
<!--Welcome Page(LogIn) Unit-->

<?php 

include 'db.inc.php';//connection with the database	
session_start();

if (isset($_POST['UserId']) && isset($_POST['Password']))
{
		$attempts = $_SESSION['attempts'];
	
		echo $attempts;
		
		$sql = "SELECT * FROM LogIn WHERE UserId = '$_POST[UserId]' AND Password = '$_POST[Password]'";
		
	if (!mysqli_query($con, $sql))
			echo "Error in Query".mysqli_error($con);		
   else
	{
		if(mysqli_affected_rows($con)==0)
		{
			$attempts++;					
			
			if($attempts<=3)
			{
				$_SESSION['attempts']=$attempts;
				buildPage($attempts);			
				echo "<div>  No records found with this username and password</div> ";
			}		
			else
			{
				echo"<div> Sorry, you have used all your attempts<br>
					Shutting down...
					</div> ";		
			}
		}
		else
			{
				$_SESSION['user']= $_POST['UserId'];
				include "afterLogIn.html.php";
			}
	}
}
else
{
	$attempts = 1;
	$_SESSION ['attempts'] = $attempts;
	buildPage($attempts);
}

function buildPage($att)
{
	echo " <link rel='stylesheet' type='text/css' href='WelcomePage.css'>
	<form class='boxshadow' method='post' action='WelcomePage.php'>
                <h2>Welcome to Our System</h2><br>
				<h2>Please Log In </h2>
                <br>
			
                    <div class='row'>
                        <div class='col1'>
                            <label for='UserId'>User Id</label>
                            <input type='text' name='UserId' id='UserId' required />
                        </div>
						<div class='col1'>
                            <label for='Password'>Login Password</label>
                            <input type='password' name='Password' id='Password' required />
                        </div>	
                    </div>


				<div class='buttons'>
                    <input type='submit' value='Log In' name='submit'/>
					<button type='reset' >Cancel</button>
                </div>
				
        <input type='checkbox' name='remember'>&nbsp &nbsp &nbsp Remember me<br>
      <span><a href='ChangePassword.html.php'>Forgot password?</a></span><br>
	  <span>Don't have an account?<a href='createAccount.html.php'>Sign up now</a></span><br>
  </form>";
}
mysqli_close($con);

?>


	
	

			
				
