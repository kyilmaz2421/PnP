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
<?php

$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = $_SESSION['login_user'];




	  
try {   
    $placeId = $_POST['placeId'];
        
        echo '<!DOCTYPE html>
        <html>
        <head>
        <title>Book</title>
        
        <link rel="stylesheet" type="text/css" href="../css/general.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <header>
        <h1>PnP</h1>
        <!-- <p>  Place n Party </p> -->
      
        <div style="float: right"> 
        '.$_SESSION['login_lastName'].' ,  '.$_SESSION['login_firstName'].'
          <a href="../php/log_out.php"><button class="logoutbtn">Log Out</button></a>
        </div>
      
      </header>
      <div>
      <section class = "navBar">
          <a id="cancel" href="viewingPage.php"><button id="post"> Cancel </button></a>
      </section>
      </div>

        <body>

       <p id="bookingConfirmation">
       '.$_POST['booker'].' Please confirm your booking of '.$_POST['owner'].'\'s place on '.$_POST['bookDate'].'   
       </p>

        <form method="POST" action="http://34.213.205.49/pnp/php/book_place.php">     
            <input type="hidden" name="placeId" value="'. $placeId .'">
            <input type="hidden" name="owner" value="'.$_POST['owner'].'">
            <input  type="hidden"name="booker" value="'.$_POST['booker'].'">
            <input  type="hidden" name="bookDate" value="'.$_POST['bookDate'].'">
            <button type="submit" id="postbtn">Confirm Booking</button>
        </form>
        
        </body>
        </html>';
}

catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }


?>



