<?php
    // Purpose: start the session for the user
    // Associated with all views
    // Authors: Eric Anderson, Andrea Hyder

   session_start();

   $user_check = isset($_SESSION['login_user']);

   // connect to db using PDO strategy
   $db = new PDO("mysql:host=localhost;dbname=pnpdb", "root", "pnpdbpassword1");

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// query db if it has User's entries
	$sql1 = "SELECT * FROM Users WHERE Username='"  . $user_check . "'";

	$dbUsername = $db->query($sql1)->fetchAll(PDO::FETCH_COLUMN);
?>
