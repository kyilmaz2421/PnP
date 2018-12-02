<?php
	// session_start();
	// include("../php/session.php");
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
		PnP View
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<!-- fix this so that it doesn't use the href__-->

	<!--Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../css/view.css">
	<link rel="stylesheet" type="text/css" href="../css/general.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	var form = $('#query');
	form.submit( function (ev) {
		ev.preventDefault();
		
		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			success: function(response){
				document.getElementById('main').innerHTML=response;
			},
			error: function(xhr, desc, err) {
				alert(err);
				alert(desc);
				var err = eval("(" + xhr.responseText + ")");
				console.log('err:'+err);
				xhr.abort();
			}
		});
	});
	$("#submit").click();
});
// $("#query").click(function(){
// 	var form = $('#query');
// 	ev.preventDefault();
// 	$.ajax({
// 	  type: 'POST',
// 	  url: 'http://localhost/pnp/php/getPlace.php',
// 	  data: form.serialize(),
// 	  success: function (response) {
// 	   // We get the element having id of display_info and put the response inside it
// 			if(response === 'NotFalse') {
// 				alert('NotFalse');
// 				alert(query)
// 			} else {
// 				$( '#main' ).html(response);
// 				alert(query);
// 			}
// 		}
// 	});
//$("#main").load("php/getPlace.php", {query});
// });


// window.onload = function(){
// 		// Pick a default tab to have open on first page load:
// 		var form = $('#query');
// 		//document.getElementById("defaultOpen").click();
// 		// document.fillMyPlaces();
// 		$.ajax({
// 		  type: 'POST',
// 		  url: 'http://localhost/pnp/php/getPlace.php',
// 		  data: form.serialize(),
// 		  success: function (response) {
// 		   // We get the element having id of display_info and put the response inside it
// 				if(response === 'NotFalse') {
// 					alert('NotFalse');
// 				} else {
// 					$( '#myPlaces' ).html(response);
// 				}
// 			}
// 		});
		 
// 		$("#main").load("php/getPlace.php", {query});
// 	}


</script> 

<body>
	<header>
	  <h1>PnP</h1>
	  <p> - - - Place n Party</p>
	  <div style="float: right"> 
	  	<?php echo ($_SESSION['login_lastName'])?>,  <?php echo ($_SESSION['login_firstName']) ?>
		<a href="../php/log_out.php"><button class="logoutbtn">Log Out</button></a>
	  </div>
	</header>
	<section class = "navBar">
		<a href="profile.php"><button id="myProfile"> My Profile </button></a>
		<a href="post.php"><button id="post"> Post a Place </button></a>
	</section>
	
	<section class = "pageBody"> 

	<form id="query" method="post" action="../php/getPlace.php">
		<section class = "sideFilter">
			<h3>Filters</h3>
			<ul>	
				<li> Date Of booking:
				<input Type="date" name="bookDate">
				</li>
				<br>
				<li>Type of Space: 
					<br><input type="radio" name="spaceType" value="Home"> Home
					<br><input type="radio" name="spaceType" value="Apartment"> Apartment
					<br><input type="radio" name="spaceType" value="Loft"> Loft
					<br><input type="radio" name="spaceType" value="Large Space"> Large Space
					<br><input type="radio" name="spaceType" value="Backyard/Deck"> Backyard/Deck
					<br><input type="radio" name="spaceType" value="Rooftop/Penthouse"> Rooftop/Penthouse
					<br><input type="radio" checked="checked" name="spaceType" value="0"> Any

				</li>
				<br>

				<li>Price Per Night
					<br> <input type="radio" name="price" value="50"> &lt; $50
					<br> <input type="radio" name="price" value="100"> &lt; $100
					<br> <input type="radio" name="price" value="150"> &lt; $150
					<br> <input type="radio" name="price" value="200"> &lt; $200	
					<br> <input type="radio" name="price" value="250"> &lt; $250	
					<br> <input type="radio" checked="checked" name="price" value="0"> &gt; Any
				</li>

				<br>
				<li>Rating
					<br> <input type="radio" name="rating" value="1"> &gt; 1
					<br> <input type="radio" name="rating" value="2"> &gt; 2
					<br> <input type="radio" name="rating" value="3"> &gt; 3
					<br> <input type="radio" name="rating" value="4"> &gt; 4	
					<br> <input type="radio" name="rating" value="5"> &gt; 5
					<br> <input type="radio" checked="checked" name="rating" value="0"> Any
				
				<br>
				<li>Pets Permitted: 
					<br> <input type="radio" name="pets" value="1"> Yes
					<br> <input type="radio" name="pets" value="0"> No	
					<br> <input type="radio" checked="checked" name="pets" value="-1"> Any
				<li>Alcohol Permitted: 
					<br> <input type="radio" name="alcohol" value="1"> Yes
					<br> <input type="radio" name="alcohol" value="0"> No
					<br> <input type="radio" checked="checked" name="alcohol" value="-1"> Any
				<li>WheelchairAccessible:
					<br> <input type="radio" name="wheelchair" value="1"> Yes
					<br> <input type="radio" name="wheelchair" value="-1"> No
					<br> <input type="radio" checked="checked" name="wheelchair" value="-1"> Any
				<li>Smoking Permitted:
					<br> <input type="radio" name="smoking" value="1"> Yes
					<br> <input type="radio" name="smoking" value="0"> No
					<br> <input type="radio" checked="checked" name="smoking" value="-1"> Any
				<li>Outdoor Access:
					<br> <input type="radio" name="outdoors" value="1"> Yes
					<br> <input type="radio" name="outdoors" value="0"> No
					<br> <input type="radio" checked="checked" name="outdoors" value="-1"> Any
			</ul>
			<button id="submit" type="submit">Filter</button>
		</form >	
		
	</section>
		<section class = "mainView" id = "main">
	</section>

</body>
</html>
