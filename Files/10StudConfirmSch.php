<?php
session_start();
$_SESSION["appTime"] = $_POST["appTime"]; // radio button selection from previous form
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Confirm Appointment</title>
	<link rel='stylesheet' type='text/css' href='../css/standard.css'/>  </head>
  <body>
	<div id="login">
      <div id="form">
        <div class="top">
		<h1>Confirm Appointment</h1>
	    <div class="field">

                <!--Form where we send the information-->
		<form action = "StudProcessSch.php" method = "post" name = "SelectTime">
	    <?php
			$debug = false;
			include('../CommonMethods.php');
			$COMMON = new Common($debug);
			
                        //Set local variables for student info
			$firstn = $_SESSION["firstN"];
			$lastn = $_SESSION["lastN"];
			$studid = $_SESSION["studID"];
			$major = $_SESSION["major"];
			$email = $_SESSION["email"];
			
                        //If this is a rescheduling, 
			if($_SESSION["resch"] == true){
				$sql = "select * from Proj2Appointments where `EnrolledID` like '%$studid%'";
				$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
				//Obtain old information
				$row = mysql_fetch_row($rs);
				$oldAdvisorID = $row[2];
				$oldDatephp = strtotime($row[1]);
				
				//Individual appointment
				if($oldAdvisorID != 0){
					$sql2 = "select * from Proj2Advisors where `id` = '$oldAdvisorID'";
					$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
					$row2 = mysql_fetch_row($rs2);
					$oldAdvisorName = $row2[1] . " " . $row2[2];
					$AdvisingLocation = $row2[6];
					$advisorOffice = $row2[5];
				}

				//Group appointment
				else{$oldAdvisorName = "Group";}
				
				//Display old appointment info
				echo "<h2>Previous Appointment</h2>";
				echo "<label for='info'>";
				echo "Advisor: ", $oldAdvisorName, "<br>";
				echo "Appointment: ", date('l, F d, Y g:i A', $oldDatephp), "</label><br>";
			
			}
			
                        //Set the advisor and current time
			$currentAdvisorName;
			$currentAdvisorID = $_SESSION["advisor"];
			$currentDatephp = strtotime($_SESSION["appTime"]);

                        //Individual appointment
			if($currentAdvisorID != 0){
				$sql2 = "select * from Proj2Advisors where `id` = '$currentAdvisorID'";
				$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
				$row2 = mysql_fetch_row($rs2);
				$currentAdvisorName = $row2[1] . " " . $row2[2];
				$AdvisingLocation = $row2[6];
				$advisorOffice = $row2[5];
			}

                        //Group appointment
			else{$currentAdvisorName = "Group";}
			
                        //Display new appointment info
			echo "<h2>Current Appointment</h2>";
			echo "<label for='newinfo'>";
			echo "Advisor: ",$currentAdvisorName,"<br>";
			echo "Appointment: ",date('l, F d, Y g:i A', $currentDatephp), "<br>";
			echo "Advising Location: ", $AdvisingLocation, "<br>";
			echo "Advisor's Office: ", $advisorOffice, "</label>", "<br>";
		?>
        </div>

	    <!--Confirmation button-->
	    <div class="nextButton">
		<?php
			if($_SESSION["resch"] == true){
				echo "<input type='submit' name='finish' class='button large go' value='Reschedule'>";
			}
			else{
				echo "<input type='submit' name='finish' class='button large go' value='Submit'>";
			}
		?>

	                <!--Cancel button-->
			<input style="margin-left: 50px" type="submit" name="finish" class="button large" value="Cancel">
	    </div>
		</form>
		</div>
  </body>
</html>