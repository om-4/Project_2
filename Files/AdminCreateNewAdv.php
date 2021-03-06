<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Create New Admin</title>
	<link rel='stylesheet' type='text/css' href='../css/standard.css'/>

     <script type="text/javascript">
    //   window.onload = function () {
    //       document.getElementById("PassW").onchange = validatePassword;
    //       document.getElementById("ConfP").onchange = validatePassword;
    //   }
    //   function validatePassword(){
    //     var pass2=document.getElementById("ConfP").value;
    //     var pass1=document.getElementById("PassW").value;
    //     if(pass1!=pass2)
    //         document.getElementById("ConfP").setCustomValidity("Passwords Don't Match");
    //     else
    //         document.getElementById("PassW").setCustomValidity('');  
    //     //empty string means no validation error
    //   }
    // </script>
  </head>
   <body>
    <div id="login">
      <div id="form">
        <div class="top">
		<h2>Create New Advisor Account</h2>
		<?php

      //Password does not match
      //if($_SESSION["PassCon"] == true){
        //echo "<h3 style='color:red'>Passwords do not match!!</h3>";
    //}
    ?>
		<form action="AdminCreateNew.php" method="post" name="Create">

                <!--First name field-->
		<div class="field">
	      		<label for="firstN">First Name</label>
	      		<input id="firstN" size="20" maxlength="50" type="text" name="firstN" required autofocus>
	    	</div>

                <!--Last name field-->
	    	<div class="field">
	     		<label for="lastN">Last Name</label>
	      		<input id="lastN" size="20" maxlength="50" type="text" name="lastN" required>
	   	</div>	

                <!--Username field-->
		<div class="field">
	     		<label for="UserN">Username</label>
	      		<input id="UserN" size="20" maxlength="50" type="text" name="UserN" required>
	   	</div>	 

                <!--Password field-->
		<div class="field">
	     		<label for="PassW">Password</label>
	      		<input id="PassW" size="20" maxlength="50" type="password" name="PassW" required>
	   	</div>	

                <!--Confirm password-->
		<div class="field">
	     		<label for="ConfP">Confirm Password</label>
	      		<input id="ConfP" size="20" maxlength="50" type="password" name="ConfP" required>
	   	</div>	
		<br>

                <!--MeetingLocation field-->
                <div class="field">
                        <label for="MeetLoc">Meeting Location</label>
                        <input id="MeetLoc" size="20" maxLength="50" type="text" name="MeetLoc" required>
                </div>
                <br>

                <!--Location field-->
                <div class="field">
                        <label for="Loc">Location</label>
                        <input id="Loc" size="20" maxLength="50" type="text" name="Loc" required>
                </div>
                <br>

		<div class="nextButton">
			<input type="submit" name="next" class="button large go" value="Submit">
	    </div>
		</form>
		<form method="link" action="AdminUI.php">
			<input type="submit" name="home" class="button large" value="Cancel">
		</form>

	</div>
	</div>
	</div>
  </body>
</html>
