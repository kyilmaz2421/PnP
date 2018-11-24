<?php 

  include("server_config.php");
  include("session.php");

  ValidCredentials();

	function ValidCredentials() {
    	$success = false;

		try {

			$unameEntry = null;
			$passwordEntry = null;

			if(isset($_POST['username'])) {
				$unameEntry = $_POST['username'];
			}

			if(isset($_POST['password'])) {
				$passwordEntry = $_POST['password'];
			}

			// echo 'herez';

			$db = new PDO("mysql:host=localhost;dbname=pnpdb", "root", "pnpdbpassword1");

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// query db if it has user's entries
			$sql1 = "SELECT * FROM Users WHERE Username='"  . $unameEntry . "'";

			// a single array with the user name at index 0 if users exists otherwise empty
			$dbUsername = $db->query($sql1)->fetchAll(PDO::FETCH_COLUMN);

			$isUser = False;
			$hasPass = False;

			// when size is 1 user exists
			if(sizeof($dbUsername) === 1) {
				$isUser = True;
				// echo 'isuers';
			} 

			$sql2 = "SELECT * FROM Users WHERE Password='"  . $passwordEntry . "'";

			$dbPassword = $db->query($sql2)->fetchAll(PDO::FETCH_COLUMN);

			if(sizeof($dbPassword) === 1) {
				// echo 'haspass';
				$hasPass = True;

			} else {
				// echo ' no pass';
			}

			// redirect user if they are in db
			if($isUser && $hasPass) {
				$_SESSION['login_user'] = $unameEntry;
				// header("Location: http://localhost/pnp/viewingPage.html");
				$success = True;
				
				echo 'ValidCredentials';

				// exit;
			} else {
			 	$error = "Your Login Name or Password is invalid";
			 	// echo ($error);
			}

			} catch (PDOException $e) {
				echo $e->getMessage();
				return $success;
			}
	}
?>