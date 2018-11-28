<?php
   // include('server_config.php');
   session_start();
   
   $user_check = isset($_SESSION['login_user']);

   $db = new PDO("mysql:host=localhost;dbname=pnpdb", "root", "pnpdbpassword1");

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// query db if it has user's entries
	$sql1 = "SELECT * FROM Users WHERE Username='"  . $user_check . "'";

	$dbUsername = $db->query($sql1)->fetchAll(PDO::FETCH_COLUMN);

   // Cannot have this for now since we are not successfully killing the sessions so we can never go to index page:
   // if(!isset($_SESSION['login_user'])){
   //    header("location:index.php");
   // }
?>