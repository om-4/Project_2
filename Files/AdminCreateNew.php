<?php
  session_start();

//Jump to CreateNewAdv
if($_POST["PassW"] != $_POST["ConfP"]){
  header('Location: AdminCreateNewAdv.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Create New Admin</title>
    <script type="text/javascript">
    function saveValue(target){
	var stepVal = document.getElementById(target).value;
	alert("Value: " + stepVal);
    }
    </script>
  <link rel='stylesheet' type='text/css' href='../css/standard.css'/>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
		<h2>New Advisor has been created:</h2>

		<?php

                        //Set local variables
                        $first = $_POST["firstN"];;
                        $last = $_POST["lastN"];;
                        $user = $_POST["UserN"];
                        $pass = $_POST["PassW"];
                        $loc = $_POST["Loc"];
//echo("<br>meet is ".$_POST["MeetLoc"]."<br>");
                        $meetLoc = $_POST["MeetLoc"];
//echo("<br>meet is ".$meetLoc."<br>");
                        //Connect to database
			include('../CommonMethods.php');
			$debug = false;
			$Common = new Common($debug);

      //See if the advisor already exists
      /*$sql = "SELECT * FROM `Proj2Advisors` WHERE `Username` = '$user' AND `FirstName` = '$first' AND  `LastName` = '$last' AND `Location` = '$loc'";*/
      $sql = "select * from `Proj2Advisors` where `Username` = '$user' AND `FirstName` = '$first' AND  `LastName` = '$last'";
      $rs = $Common->executeQuery($sql, "Advising Appointments");
      $row = mysql_fetch_row($rs);
      if($row){
	//echo("row is ".$row[0]."<br>");
        echo("<h3>Advisor $first $last already exists</h3>");
      }

      //HAVE TO SWITCH OFFICE TO LOCATION
      //If advisor doesn't exist, create one
      else{
  			$sql = "INSERT INTO `Proj2Advisors`(`FirstName`, `LastName`, `Username`, `Password`, `Location`,`MeetingLocation`) 
  			VALUES ('$first', '$last', '$user', '$pass', '$loc','$meetLoc')";
        echo ("<h3>$first $last<h3>");
        $rs = $Common->executeQuery($sql, "Advising Appointments");
      }
		?>
		<form method="link" action="AdminUI.php">
			<input type="submit" name="next" class="button large go" value="Return to Home">
		</form>
	</div>
	</div>
	</div>
	</form>
  </body>
  
</html>
