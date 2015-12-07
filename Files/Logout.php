<?php
session_start();
$flag = true;

if(isset($_SESSION['userId'])) { $flag = false; }

session_unset();
session_destroy();

//Jump back to student sign in page
if($flag) { header("Location: 01StudSignIn.html"); }

//Jump to logging in as a student or an admin
else { header("Location: StudentAdminSignIn.html"); }

?>