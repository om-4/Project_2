<?php
session_start();

$_SESSION["GroupApp"] = $_POST["GroupApp"];
$_SESSION["Delete"] = false;

//If we want to delete the appointment, change values and confirm
if ($_POST["next"] == "Delete Appointment"){
	$_SESSION["Delete"] = true;
	$_SESSION["advisor"] = $_POST["next"];
	header('Location: AdminConfirmEditGroup.php');
}

//If we want to edit, jump to where we edit
elseif ($_POST["next"] == "Edit Appointment"){
	header('Location: AdminProceedEditGroup.php');
}

?>