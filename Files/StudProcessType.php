<?php
session_start();

//If we have a group appointment
if ($_POST["type"] == "Group"){
	$_SESSION["advisor"] = $_POST["type"];
	header('Location: 08StudSelectTime.php');
}

//If we have an individual appointment
elseif ($_POST["type"] == "Individual"){
	header('Location: 07StudSelectAdvisor.php');
}
?>