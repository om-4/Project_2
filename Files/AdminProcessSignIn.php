<?php

/* Had to make sure sessions was enabled. Some help here:

https://wiki.umbc.edu/pages/viewpage.action?pageId=46563550

cd /afs/umbc.edu/public/web/sites/coeadvising/prod/php/session/

/usr/bin/fs sa /afs/umbc.edu/public/web/sites/coeadvising/prod/php/session/ web.coeadvising all


then edit .htaccess file here in the same directory

*/


session_start();

include('../CommonMethods.php');
$debug = false;
$Common = new Common($debug);

//$_SESSION["UserN"] = strtoupper($_POST["UserN"]);
//$_SESSION["PassW"] = strtoupper($_POST["PassW"]);
//$_SESSION["UserVal"] = false;

$user = strtoupper($_POST["UserN"]);
$pass = strtoupper($_POST["PassW"]);


//Find the advisor with matching username and password
$sql = "SELECT * FROM `Proj2Advisors` WHERE `Username` = '$user' and `Password` = '$pass' ";
$rs = $Common->executeQuery($sql, "Advising Appointments");
$row = mysql_fetch_row($rs);

if($row){
	if($debug) { echo("<br>".var_dump($_SESSION)."<- Session variables above<br>"); }
	else { 
	  $_SESSION["userId"] = $row[0];
	  header('Location: AdminUI.php');
}
}
else{
	$_SESSION["userId"] = -1;
	header('Location: AdminSignIn.php'); 
}

?>