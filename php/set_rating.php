<?php
	// Purpose: booking a place Button
	// Associated with: getPastBookings.php
	// Author: Alana Ceci
	include("../php/sign_in_page.php");
	$_SESSION['redirect'] = FALSE; //for debugging purposes
	// If no session is started, redirect to index page:
	if(!isset($_SESSION['login_user'])) {
		header("Location: ../index.php");
		$_SESSION['redirect'] = TRUE; //for debugging purposes
	}

$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = $_SESSION['login_user'];

if(isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $placeId = $_POST["placeId"];
        $rating = intval($_POST["rating"]);

        try{
                $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Set the username to the current logged in user:
                //$placeId = $_SESSION['login_user'];
                // The sql query string:
                $placeToUpdate = "SELECT * FROM Places WHERE PlaceId='" . $placeId . "'";

                // Get result set from db
                $result = $conn->query($placeToUpdate)->fetchAll(PDO::FETCH_ASSOC);

                // To get rating + num of ratings of this place:
                $currentRating = intval($result['Rating']);
                $currentNoRatings = intval($result['RatingNumber']);

                $newNoRatings = $currentNoRatings + 1;

                $newRating = (($currentRating * $currentNoRatings) + $rating) / $newNoRatings;

                $insertNewRating = "UPDATE Places SET Rating = '" . $newRating . "', RatingNumber = '" . $newNoRatings . "'";

                $conn->exec($insertNewRating);
        }

        catch (PDOException $e){

        }

    }
}

?>