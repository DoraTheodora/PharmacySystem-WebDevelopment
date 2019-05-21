<!DOCTYPE html>
<html>
<head>
<!-- CSS FILE--> <link rel="stylesheet" type="text/css" href="../../pharmacy/css/styles.css">
    <!--Font--><link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!--Pop Up Alerts-->
    <script type="text/javascript" src="../../pharmacy/js/popUp.js"></script>
   <script type="text/javascript" src="../../pharmacy/js/alertbox.js"></script>
   <!-- Menu--><script type="text/javascript" src="../../pharmacy/js/leftnav.js"></script>
   <!-- //////////////////////////////////////////////////////////////////// -->
<!-- Left side menu -->
<body id="main">
   <?php
        echo '<script type="text/javascript">togNav();</script>';
        echo '<script type="text/javascript">showalert("green");</script>';
    ?>
    <?php include '../../pharmacy/leftnav.php'; ?>
   <?php include '../../pharmacy/alertbox.php'; ?>
</head>
 <title>Change Password</title>
<body>

   <form class="boxshadow" method="post" action="ChangePassword.php" onSubmit="return validatePassword()">
  <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
				<h2>Change Password</h2>
                <br>
                <fieldset>
                    <div class="row">
                        <div class="col1">
                            <label for="Password">Old Password</label>
                            <input type="text" name="Password" id="Password" required />
                        </div>
						<div class="col1">
                            <label for="newPassword">New Password</label>
                            <input type="newPassword" name="newPassword" id="newPassword" required />
                        </div>	
						<div class="col1">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="confirmPassword" name="confirmPassword" id="confirmPassword" required />
                        </div>	
                    </div>
                </fieldset>
				
				<div class="buttons">
                    <input type="submit" value="Change Password" name="submit" />
					<button type="reset" >Cancel</button>
                </div>
				
        <input type="checkbox" name="remember">&nbsp &nbsp &nbsp Remember me<br>
	  <span>Don't have an account?<a href="createAccount.html.php">Sign up now</a></span><br>
  </form>

</body>
</html>
