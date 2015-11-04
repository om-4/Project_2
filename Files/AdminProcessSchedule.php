<?php
session_start();

//If we have a group appointment, set our session value and jump to group
if ($_POST["next"] == "Group"){
	$_SESSION["advisor"] = $_POST["next"];
	header('Location: AdminScheduleGroup.php');
}

//Otherwise, jump to individual appointments to schedule
elseif ($_POST["next"] == "Individual"){
	header('Location: AdminScheduleInd.php');
}

?>