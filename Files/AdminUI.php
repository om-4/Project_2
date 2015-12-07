<?php 
session_start();
$debug = false;
if($debug) { echo("Session variables-> ".var_dump($_SESSION)); }

include('../CommonMethods.php');
$COMMON = new Common($debug);
//$_SESSION["PassCon"] = false;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Home</title>
	<link rel='stylesheet' type='text/css' href='../css/standard.css'/>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
	<h2> Hello 
	<?php
  //echo("<br>session id is ".$_SESSION["userId"]."<br>");
       $sql = "SELECT `firstName` FROM `Proj2Advisors`WHERE `id` = ".$_SESSION["userId"];
       $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
       $row = mysql_fetch_row($rs);
       $name = $row[0];
	if(!isset($name)) // someone landed this page by accident
	{
		return;
	}		

                //Set the username and password, then find the advisor name
		//$User = $_SESSION["UserN"];
		//$Pass = $_SESSION["PassW"];
		echo $name;
	?>
	</h2>
	
	<!--Process the decision the user makes-->
	<form action="AdminProcessUI.php" method="post" name="UI">
  
		<input type="submit" name="next" class="button large selection" value="Schedule appointments"><br>
		<input type="submit" name="next" class="button large selection" value="Print schedule for a day"><br>
		<input type="submit" name="next" class="button large selection" value="Edit appointments"><br>
		<input type="submit" name="next" class="button large selection" value="Search for an appointment"><br>
		<input type="submit" name="next" class="button large selection" value="Create new Admin Account"><br>
	
	</form>
	<br>

	<form method="link" action="Logout.php">
		<input type="submit" name="next" class="button large go" value="Log Out">
	</form>
          
        </div>
        <div class="field">
          
        </div>
	</div>

	<?php include('../workOrder/workButton.php'); ?>

</body>
  
</html>
