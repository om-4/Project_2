<?php
session_start();

//Jump to scheduling an appointment
if($_POST["next"] == 'Schedule appointments'){
	header('Location: AdminScheduleApp.php');
}

//Jump to printing a schedule
elseif($_POST["next"] == 'Print schedule for a day'){
	header('Location: AdminPrintSchedule.php');
}

//Jump to editing appointments
elseif($_POST["next"] == 'Edit appointments'){
	header('Location: AdminEditApp.php');
}

//Jump to searching for an appointment
elseif($_POST["next"] == 'Search for an appointment'){
	header('Location: AdminSearchApp.php');
}

//Jump to creating a new advisor
elseif($_POST["next"] == 'Create new Admin Account'){
	header('Location: AdminCreateNewAdv.php');
}

?>