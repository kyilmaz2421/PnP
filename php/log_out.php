<?php
   // include("server_config.php");
   // include("session.php");
	include("../php/sign_in_page.php");

   session_start();
   $_SESSION['logout'] = TRUE;

   ////////////////////// >
   // Remove all session variables:
   // session_unset(); 
	// unset($_SESSION['login_user']);
	// unset($_SESSION['login_firstName']);
	// unset($_SESSION['login_lastName']);
	// unset($_SESSION['login_email']);
	// unset($_SESSION['login_phoneNumFormatted']);
	// unset($_SESSION['login_phoneNumber']);
	// unset($_SESSION['login_genderFormatted']);
	// unset($_SESSION['login_gender']);
	// unset($_SESSION['login_bdayFormatted']);
	// unset($_SESSION['login_birthdate']);
	// unset($_SESSION['login_description']);

   // Destroy the session:
   // session_destroy(); 
   // < ////////////////////

   header("Location: ../index.php");
?>