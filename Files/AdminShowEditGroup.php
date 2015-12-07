<?php
session_start();
$debug = false;
echo("on AdminShowEditGroup.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Edit Group Appointment</title>
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
                <div class="field">

<?php
      include('../CommonMethods.php');
      $COMMON = new Common($debug);
  
      echo("row 0 is ".$row[0]."<br>");

      echo("<br>time is ".date('l, F d, Y g:i A', strtotime($row[0])). "<br>");
      echo("<br>row 0 is ".$row[0]."<br>");
      echo("<h1>Changed Appointment</h1><br>");
      echo("<h2>Previous Appointment:</h2>");
      echo("Time: ". date('l, F d, Y g:i A', strtotime($row[0])). "<br>");
      echo("Majors included: ");
      if($row[1]){
        echo("$row[1]<br>");
      }
      else{
        echo("Available to all majors<br>");
      }

      //Print out student data
      echo("Number of students enrolled: $row[2]<br>");
      echo("Student limit: $row[3]");
      echo("<h2>Updated Appointment:</h2>");
      $limit = $_POST["stepper"];
echo("limit is ".$limit."<br>");
      echo("<b>Time: ". date('l, F d, Y g:i A', strtotime($row[0])). "</b><br>");
      echo("<b>Majors included: ");
      if($row[1]){
      echo("$row[1]</b><br>");
      }
      else{
        echo("Available to all majors</b><br>");
      }

      echo("<b>Number of students enrolled: $row[2] </b><br>");
      echo("<b>Student limit: $limit</b>");

      //Update the max number of students
      $sql = "UPDATE `Proj2Appointments` SET `Max`='$limit' WHERE `Time` = '$row[0]' AND `AdvisorID` = '$0' AND `Major` = '$row[1]' AND `EnrolledNum` = '$row[2]' AND `Max` = '$row[3]'";
      $rs = $COMMON->executeQuery($sql, "Advising Appointments");

     //Return home
     echo("<br><br>");
     echo("<form method=\"link\" action=\"AdminUI.php\">");
     echo("<input type=\"submit\" name=\"next\" class=\"button large go\" value=\"Return to Home\">");
     echo("</form>");
   
        ?>
        </div>
        </div>
        </div>
        </form>
  </body>

</html>

