<?php
	include("../php/sign_in_page.php");

   session_start();
   // log the user out
   $_SESSION['logout'] = TRUE;

   header("Location: ../index.php");
?>
