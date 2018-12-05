<?php
	include("../php/sign_in_page.php");
	$_SESSION['redirect'] = FALSE; //for debugging purposes

	// If no session is started, redirect to index page:
	if(!isset($_SESSION['login_user'])) {
		header("Location: ../index.php");
		$_SESSION['redirect'] = TRUE; //for debugging purposes
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		PnP Post Success
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
	<!-- fix this so that it doesn't use the href__-->

	<!--Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../css/view.css">
	<link rel="stylesheet" type="text/css" href="../css/general.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>

<body>
	<header>
	  <h1>PnP</h1>
	  <!-- <p> - - - Place n Party</p> -->
	  <div style="float: right">
	  	<?php echo ($_SESSION['login_lastName'])?>,  <?php echo ($_SESSION['login_firstName']) ?>
		<a href="../php/log_out.php"><button class="logoutbtn">Log Out</button></a>
	  </div>
	</header>
	<div>
		<section class = "navBar">
			<a href="profile.php"><button id="myProfile"> My Profile </button></a>
			<a href="post.php"><button id="post"> Post another Place </button></a>

			<div class="leftRightNavBar">
				<!-- Back button to viewing page:  -->
				<a href="viewingPage.php"><button id="backToView" class="backbtn"><i class="left"></i> Back To Viewing Page</button></a>
			</div>
		</section>
	</div>
	<h1>Thank you for posting your place</h1>
	<!-- <?php phpinfo() ?> -->
	<?php print_r ($_FILES); ?>
	<?php echo ($_FILES['photos1']['name']); ?>
</body>
</html>
