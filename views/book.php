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

		// if($_SERVER['REQUEST_METHOD'] === "POST"){
		// 	$bookDate = False;
		// 	if(isset($_POST['bookDate'])){
		// 		 $bookDate == explode("-", $_POST['bookDate']);
		// 	}
		// }	
	    // $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);

		// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// $stmt = $conn->prepare('SELECT * FROM Bookings WHERE UsernameClient = :username AND PlaceID = :placeId');
		// $stmt->execute(['username' => $usernamePerson, 'placeId' => $placeId]);
		// $result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// if($result === False){
		// echo "Query doesnt exist";
		// }
		// $entryNum = 0;
		// $createDate = explode("-", $_POST['creationDate']);

		// if(( (int)$bookDate[0])-((int)$createdate[0] )===0){
		// 	if(((int)$bookDate[1] )-((int)$createdate[1] )===0){
		// 		if(((int)$bookDate[2] )-((int)$createdate[2] )===0){
		// 			$entryNum = 0;
		// 		}		
		
		// 	}
		// }	

       // $availabilities = str_split($result['Availabilities']);
        
        echo '<!DOCTYPE html>
        <html>
        <head>
        <title>Book</title>
        
        <link rel="stylesheet" type="text/css" href="../css/general.css">
        <header>
        <h1>PnP</h1> 

        </header>
        <body>

       <p>
       '.$_POST['bookDate'].'   
       <br> 
       '.$_POST['placeId'].'
       <br>
       '.$_POST['booker'].'
       '.$_POST['owner'].'
       </p>

        <form method="POST" action="http://localhost/pnp/php/book_place.php">     
            <input type="date" id="booking" name="bookDate" required>
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



