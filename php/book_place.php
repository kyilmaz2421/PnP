<?php
 include("../php/session.php");

$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = $_SESSION['login_user'];


	  
try {   

		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$bookDate = False;
			if(isset($_POST['bookDate'])){
				 $bookDate == explode("-", $_POST['bookDate']);
			}
		}	
		$conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	    $sql = "INSERT INTO Bookings VALUES ('{$usernamePerson}', '{$_POST["owner"]}','{$_POST['placeId']}','{$_POST["bookDate"]}')";
	    
		$conn->exec($sql);

		echo "<script type='text/javascript'>alert('Your booking has been succesfully confirmed');</script>";
		header('Location: http://localhost/pnp/views/viewingPage.php');
		exit();	

// 	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);

// 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 		$stmt = $conn->prepare('SELECT * FROM Places WHERE Username = :username AND PlaceID = :placeId');
// 		$stmt->execute(['username' => $usernamePerson, 'placeId' => $placeId]);
// 		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
// 		if($result === False){
// 		echo "Query doesnt exist";
// 		}
// 		$entryNum = 0;
// 		$createDate = explode("-", $_POST['creationDate']);

// 		if(( (int)$bookDate[0])-((int)$createdate[0] )===0){
// 			if(((int)$bookDate[1] )-((int)$createdate[1] )===0){
// 				if(((int)$bookDate[2] )-((int)$createdate[2] )===0){
// 					$entryNum = 0;
// 				}		
		
// 			}
// 		}	

// 		$availabilities = str_split($result['Availabilities']);
 }

catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }


?>
