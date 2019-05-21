<!DOCTYPE html>
<html>
<head>

<script>

function showalert(type)
		{	
			document.getElementById(type).style.display = "block";		
			setTimeout(function() 	{document.getElementById(type).style.display = "none";},4000);		
		}
		
	function hidealert(type)
		{	
			setTimeout(function() {document.getElementById(type).style.display = "none";},1);			
		}	
		
     function togNav() 
        {		
            if (document.getElementById("mySidenav").style.width == "40px") 
            {	
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
				document.getElementById("longnav").style.display = "block";
				document.getElementById("shortnav").style.display = "none";				
				
            } 
			else 
			{
				
				document.getElementById("mySidenav").style.width = "40px";
                document.getElementById("main").style.marginLeft = "40px";
				document.getElementById("longnav").style.display = "none";
				document.getElementById("shortnav").style.display = "block";		
            }
        }
function confirmCheck()
		{
			var response;
			response = confirm('Are you sure you want to create this account?');
			if (response)
				{
					document.getElementById("UserId").disabled = false;
					document.getElementById("Password").disabled = false;
					return true;
				}
			else 
				{
					return false;
				}
		}
function validatePassword()
{
	var password = document.getElementById("Password").value;
	var confirmPassword = document.getElementById("RePassword").value;
	if (password !=confirmPassword)
	{
		alert("Password not matching");
		return false
	}
	return true;
	
}
</script>

    <link rel="stylesheet" type="text/css" href="CreateAccount.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">
    <title>Create Account</title>
</head>
<body>

  <form class="boxshadow" method="post" action="CreateAccount.php" onsubmit = "return confirmCheck()" >
                <h2>Create Account</h2>
                <br>
                <fieldset>
                    <div class="row">
                        <div class="col1">
                            <label for="UserId">User Id</label>
                            <input type="text" name="UserId" id="UserId" required />
                        </div>
						<div class="col1">
                            <label for="Password">Password</label>
                            <input type="password" name="Password" id="Password" required />
                        </div>
						<div class="col1">
                            <label for="Password">Re-Enter Password</label>
                            <input type="password" name="RePassword" id="RePassword" required />
                        </div>
                    </div>
                </fieldset>
				
				<div class="buttons">
                    <input type="submit" value="Create Account" name="submit" onclick = "return validatePassword()"/>
					<button type="reset" >Cancel</button>
                </div>
				<br>
				<br>
      <span>Already have an account?<a href="WelcomePage.html.php">Log In</a></span><br>
  </form>
  
	<div id="red" class="alertbox red">
	Error the new account in the database
		<span onclick="hidealert('red');">&times;</span>
	</div>
	
	<div id="green" class="alertbox green">
	Success adding the new account into the database
		<span onclick="hidealert('green');">&times;</span>
	</div>

</body>
</html>
