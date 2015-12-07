<?php
session_start();

//$_SESSION["GroupApp"] = $_POST["GroupApp"];
//$_SESSION["Delete"] = false;
if($_POST["next"] == "Cancel")
  {
    header('Location: AdminUI.php');
  }
elseif($_POST["next"] != "")
  {
    $tempID = $_SESSION["userId"];
    $tempGroup = $_POST["GroupApp"]."&row[]=$tempID";
    $_SESSION["userId"] = $tempGroup;

    //If we want to delete the appointment, change values and confirm
    if ($_POST["next"] == "Delete Appointment"){
      //$_SESSION["Delete"] = true;
      //$_SESSION["advisor"] = $_POST["next"];
      
      //create page to delete group appointment
      header('Location: AdminConfirmDeleteGroup.php');
    }
    
    //If we want to edit, jump to where we edit
    elseif ($_POST["next"] == "Edit Appointment"){
      header('Location: AdminProceedEditGroup.php');
    }
  }
else
  {
    $group = $_SESSION["userId"];
    parse_str($group);
    $_SESSION["userId"] = $row[4];
    header('Location: AdminUI.php');
  }    

?>