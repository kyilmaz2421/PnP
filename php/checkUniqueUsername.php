<?php 

  include("server_config.php");
  include("session.php");

  ValidCredentials();

	function ValidCredentials() {

		// For now, assume the username has not been taken:
    	$success = true;

		try {

			$unameEntry = null;

			// THIS IS NOT GETTING THE USERNAME
			if(isset($_POST['username'])) {
				$unameEntry = $_POST['username'];
			}

			$db = new PDO("mysql:host=localhost;dbname=pnpdb", "root", "pnpdbpassword1");

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Query db if it has this username already
			$sql1 = "SELECT * FROM Users WHERE Username='"  . $unameEntry . "'";

			// a single array with the user name at index 0 if users exists otherwise empty
			$dbUsername = $db->query($sql1)->fetchAll(PDO::FETCH_COLUMN);

			// var_dump($_POST);
			// when size is 1 user exists
			if (sizeof($dbUsername) === 0) {
				$success = true;
				echo 'ValidCredentials';
				// echo ' & Username: ';

				// echo ($unameEntry);
			} 

			else if (sizeof($dbUsername) === 1) {
				$success = false;
				echo 'InvalidCredentials';
				// echo ' & Username: ';
				// echo $unameEntry;
			}

		}

		catch (PDOException $e) {
			echo $e->getMessage();
			return $success;
		}

	}
?>