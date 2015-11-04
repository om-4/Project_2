<?php
session_start();

//If we have a group advising, go to where we edit group appointments
if ($_POST["next"] == "Group"){
	$_SESSION["advisor"] = $_POST["next"];
	header('Location: AdminEditGroup.php');
}

//Otherwise, go to where we edit individual appointments
elseif ($_POST["next"] == "Individual"){
	header('Location: AdminEditInd.php');
}

?>