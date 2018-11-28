<?php

	include("../php/session.php");
	echo ($_SESSION['login_user']);
?>
<!DOCTYPE html>
<html>
<head>
<title>PnP - My Profile</title>

<link rel="stylesheet" type="text/css" href="../css/general.css">
<link rel="stylesheet" type="text/css" href="../css/profile.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<header>
  <h1>PnP</h1>
  <p> - - - Place n Party</p>
  <a href="../index.php"><button class="logoutbtn">Log Out</button></a>
</header>

<body>

<section class="navBar">
	<div class="leftRightNavBar"> 
		<!-- Back button to viewing page:  -->
		<a href="viewingPage.php"><button id="backToView" class="backbtn"><i class="left"></i> Back To Viewing Page</button></a>
	</div>
	<div class="pageTitle">My Profile</div>
	<div class="leftRightNavBar">  </div>
</section>

<div id="mainBody">
	<!-- Left half of main section -->
	<div id="half" style="border-right:solid 1px">
		<!-- About You box: -->
		<div id="aboutYou">
			<h3 style="font-size: 31px">About You</u></h3>
			<p>
				<!-- Show user all of their account info: -->
				<b>Username:</b> _ _ _ <br>
				<b>First Name:</b> ___ <br>
				<b>Last Name:</b> _____ <br>
				<b>E-Mail:</b> ____ <br>
				<b>Phone Number:</b> ___ <br>
				<b>Gender:</b> ___ <br>
				<b>Birthdate:</b> ____ <br>
				<b>About You:</b> ___ 
			</p>
		</div>
		<!-- Your Places box: -->
		<div id="yourPlaces" style="border-top:solid 1px">
			<h3 style="font-size: 31px">Your Places</h3>
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
		</div>

		<div id="UpcomingBookings" class="tabcontent">
		  <h3 style="font-size: 31px">Upcoming Bookings</h3>
		  <!-- Show all upcoming bookings here (from DB) -->
		</div>

	</div>
</div>



<script>
	window.onload = function(){
		// Pick a default tab to have open on first page load:
		document.getElementById("defaultOpen").click();
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
