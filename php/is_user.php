<?php
// connection vars
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";


$unameEntry = $_POST['username'];
$passwordEntry = $_POST['password'];

try {
	    
	    // connect to db
	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    // echo "Connected successfully"; 

	    // query db if it has user's entries
	    $sql1 = "SELECT * FROM Users WHERE Username='"  . $unameEntry . "'";

	    // a single array with the user name at index 0 if users exists
	    // otherwise empty
	    $dbUsername = $conn->query($sql1)->fetchAll(PDO::FETCH_COLUMN);

		echo '<br>';

		$isUser = False;
		$hasPass = False;
	    // when size is 1 user exists
		if(sizeof($dbUsername) === 1) {
			echo 'user exists';
			$isUser = True;
		} 

		// else {
		// 	echo 'user not in db';
		// }

		echo '<br>';

		$sql2 = "SELECT * FROM Users WHERE Password='"  . $passwordEntry . "'";

		$dbPassword = $conn->query($sql2)->fetchAll(PDO::FETCH_COLUMN);

		if(sizeof($dbPassword) === 1) {
			echo 'password exists';
			$hasPass = True;
		} 
		// else {
		// 	echo 'password not in db';
		// }

		// redirect user if they are in db
		if($isUser && $hasPass) {
			header("Location: http://localhost/pnp/viewingPage.html");
			exit;
		} 
    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }

?>
