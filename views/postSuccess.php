<?php 
	$_SESSION['redirect'] = FALSE; //for debugging purposes

	// If no session is started, redirect to index page:
	if(!isset($_SESSION['login_user'])) {
		header("Location: ../index.php");
		$_SESSION['redirect'] = TRUE; //for debugging purposes
	}?>

<!DOCTYPE html>
<html>
<head>
<title>PnP</title>

<link rel="stylesheet" type="text/css" href="css/index.css">

<body>

<header>
  <h1>PnP</h1>
  <p> - - - Place n Party</p>
</header>
YEET

</body>
</html>
