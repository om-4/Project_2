<?php
session_start();

//Jump to selecting an advising type
if($_POST["selection"] == 'Signup'){
	header('Location: 03StudSelectType.php');
}

//Jump to viewing the appointment
elseif($_POST["selection"] == 'View'){
	header('Location: 04StudViewApp.php');
}

//Jump to selecting an advising type for rescheduling
elseif($_POST["selection"] == 'Reschedule'){
	$_SESSION["resch"] = true;
	header('Location: 03StudSelectType.php');
}

//Jump to cancelling an appointment
elseif($_POST["selection"] == 'Cancel'){
	header('Location: 05StudCancelApp.php');
}

//Jump to searching for an appointment
elseif($_POST["selection"] == 'Search'){
	header('Location: 09StudSearchApp.php');
}

//Jump to editing a student's information
elseif($_POST["selection"] == 'Edit'){
	header('Location: 06StudEditInfo.php');
}

//Jump to displaying the next available appointment based on major
elseif($_POST["selection"] == 'NextApp'){
  header('Location: 14ShowNextAvailable.php');
}

?>