<?php
   // include("server_config.php");
   include("session.php");

   // Remove all session variables:
   session_unset(); 
   // Destroy the session:
   session_destroy(); 

   header("Location: ../view_php/index.php");
?>