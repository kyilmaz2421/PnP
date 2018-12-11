<?php
	// Purpose: Personalized page for the users
	// Associated with: getPastBookings.php getMyPlaces.php getUpcomingBookings.
	// Authors: Andrea Hyder
	include("../php/sign_in_page.php");

	$_SESSION['redirect'] = FALSE; //for debugging purposes

	// If no session is started, redirect to index page:
	if(!isset($_SESSION['login_user'])) {
		header("Location: ../index.php");
		$_SESSION['redirect'] = TRUE; //for debugging purposes
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>PnP - My Profile</title>

<link rel="stylesheet" type="text/css" href="../css/general.css">
<link rel="stylesheet" type="text/css" href="../css/profile.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<header>
  <h1>PnP</h1>
  <!-- <p>  Place n Party</p> -->

  <div style="float: right">
  	<?php echo ($_SESSION['login_lastName'])?>,  <?php echo ($_SESSION['login_firstName']) ?>
	<a href="../php/log_out.php"><button class="logoutbtn">Log Out</button></a>
  </div>
  <!-- <a href="../php/log_out.php"><button class="logoutbtn">Log Out</button></a> -->
</header>

<body>

<section class="navBar">
	<div class="leftRightNavBar">
		<!-- Back button to viewing page:  -->
		<a href="viewingPage.php"><button id="backToView" class="backbtn"><i class="left"></i> Back To Viewing Page</button></a>
	</div>

	<div class="pageTitle"> My Profile</div>
		<a href="post.php"><button id="post" style="float: right;"> Post a Place </button></a>
</section>

<div id="mainBody">
	<!-- Left half of main section -->
	<div id="half" style="border-right:solid 1px">
		<!-- About You box: -->
		<div id="aboutYou">
			<h3 style="font-size: 31px">About You</u></h3>
			<p style="font-size: 19px">
				<!-- Show user all of their account info: -->
				<div style="width: 40%; text-align: right; display: inline-block; font-size: 19px">
					<b>Username:</b> <br>
					<b>First Name:</b> <br>
					<b>Last Name:</b> <br>
					<b>E-Mail:</b> <br>
					<b>Phone Number:</b> <br>
					<b>Gender:</b> <br>
					<b>Birthdate:</b> <br>
					<b>About You:</b> <br>
				</div>
				<div style="width: 40%; text-align: left; display: inline-block; font-size: 19px">
					<?php echo ($_SESSION['login_user']) ?> <br>
					<?php echo ( $_SESSION['login_firstName']) ?> <br>
					<?php echo ( $_SESSION['login_lastName']) ?> <br>
					<?php echo ( $_SESSION['login_email']) ?> <br>
					<?php echo ( $_SESSION['login_phoneNumFormatted']) ?> <br>
					<?php echo ( $_SESSION['login_genderFormatted'])?> <br>
					<?php echo ( $_SESSION['login_bdayFormatted']) ?> <br>
					<?php echo ( $_SESSION['login_description']) ?>
				</div>
			</p>
		</div>
		<!-- Your Places box: -->
		<div style="border-top:solid 1px">
			<h3 style="font-size: 31px">Your Places</h3>
			<div id="myPlaces">
			</div>
		</div>
	</div>

	<!-- Right half of main section -->
	<div id="half">

		<div class="tab">
		  <button class="tablinks" onclick="openView(event, 'PastBookings')" id="defaultOpen">Past Bookings</button>
		  <button class="tablinks" onclick="openView(event, 'UpcomingBookings')">Upcoming Bookings</button>
		</div>

		<!-- Tab content -->
		<div id="PastBookings" class="tabcontent">
		  <h3 style="font-size: 31px">Past Bookings</h3>
		  <!-- Show all past bookings here (from DB) -->
		  <div id="past">
		  </div>
		</div>

		<div id="UpcomingBookings" class="tabcontent">
		  <h3 style="font-size: 31px">Upcoming Bookings</h3>
		  <!-- Show all upcoming bookings here (from DB) -->
		  <div id="upcoming">
		  </div>
		</div>

	</div>
</div>

<script>
	window.onload = function(){
		// Pick a default tab to have open on first page load:
		document.getElementById("defaultOpen").click();
		// document.fillMyPlaces();
		// Ajax call for the My Places sections of the Profile page:
		$.ajax({
		  type: 'POST',
		  url: 'http://34.213.205.49/pnp/php/getMyPlaces.php',
		//   data: query,
		  success: function (response) {
		   // We get the element having id of display_info and put the response inside it
				if(response === 'NotFalse') {
					alert('NotFalse');
				} else {
					$( '#myPlaces' ).html(response);
				}
			}
		});
		// Ajax call for the Upcoming Bookings sections of the Profile page:
		$.ajax({
		  type: 'POST',
		  url: 'http://34.213.205.49/pnp/php/getUpcomingBookings.php',
		//   data: query,
		  success: function (response) {
		   // We get the element having id of display_info and put the response inside it
				if(response === 'NotFalse') {
					alert('NotFalse');
				} else {
					$( '#upcoming' ).html(response);
				}
			}
		});
		// Ajax call for the Past Bookings sections of the Profile page:
		$.ajax({
		  type: 'POST',
		  url: 'http://34.213.205.49/pnp/php/getPastBookings.php',
		//   data: query,
		  success: function (response) {
		   // We get the element having id of display_info and put the response inside it
				if(response === 'NotFalse') {
					alert('NotFalse');
				} else {
					$( '#past' ).html(response);
				}
			}
		});

		$("#myPlaces").load("php/getMyPlaces.php", {query});
		$("#UpcomingBookings").load("php/getUpcomingBookings.php", {query});
		$("#PastBookings").load("php/getPastBookings.php", {query});
	}

	function openView(evt, toView) {
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablinks");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].className = tablinks[i].className.replace(" active", "");
	    }
	    document.getElementById(toView).style.display = "block";
	    evt.currentTarget.className += " active";
	}
</script>
</body>
</html>
