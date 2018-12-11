<?php
// Purpose: Module that marks place as booked
// Associated with: viewingPage.php
// Authors: Kaan Yilmaz Alana Ceci
 include("../php/session.php");

$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = $_SESSION['login_user'];

try {
        // check that we don't have an empty request
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$bookDate = False;
			if(isset($_POST['bookDate'])){
				 $bookDate == explode("-", $_POST['bookDate']);
			}
		}
        // Connect to the db
		$conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $sql = "INSERT INTO Bookings VALUES ('{$usernamePerson}', '{$_POST["owner"]}','{$_POST['placeId']}','{$_POST["bookDate"]}')";

		$conn->exec($sql);

		echo "<script type='text/javascript'>alert('Your booking has been succesfully confirmed');</script>";
		header('Location: http://34.213.205.49/pnp/views/viewingPage.php');
		exit();
 }

catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
?>
