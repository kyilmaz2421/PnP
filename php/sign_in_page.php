<?php
    // Purpose: php for signing in or
    // Associated with index.php
    // Authors: Eric Anderson, Andrea Hyder

  include("server_config.php");
  include("session.php");

  ValidCredentials();

    /*
     * Purpose: Check if the user entered valide valid credentials
     */
	function ValidCredentials() {
    	$success = false;

		try {

			$unameEntry = null;
			$passwordEntry = null;

            // get users entries from index.php
			if(isset($_POST['username'])) {
				$unameEntry = $_POST['username'];
			}

			if(isset($_POST['password'])) {
				$passwordEntry = $_POST['password'];
			}

            // connect to db
			$db = new PDO("mysql:host=localhost;dbname=pnpdb", "root", "pnpdbpassword1");

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// query db if it has user's entries
			$sql1 = "SELECT * FROM Users WHERE Username='"  . $unameEntry . "'";

			// a single array with the user name at index 0 if users exists otherwise empty
			$dbUsername = $db->query($sql1)->fetchAll(PDO::FETCH_COLUMN);

            // Boolean values to track whether the credentials are valid
			$isUser = False;
			$hasPass = False;

			// when size is 1 user exists
            // db username is the result set and php array of the user if they exist. Otherwise sise is 0
			if(sizeof($dbUsername) === 1) {
				$isUser = True;
			}

			$sql2 = "SELECT * FROM Users WHERE Password='"  . $passwordEntry . "'";

			$dbPassword = $db->query($sql2)->fetchAll(PDO::FETCH_COLUMN);

			if(sizeof($dbPassword) === 1) {
				$hasPass = True;
			}

			// redirect user if they are in db
			// Set all session variables with their info:
			if($isUser && $hasPass) {
				$_SESSION['login_user'] = $unameEntry;
				$_SESSION['login_firstName'] = $db->query( "SELECT FirstName FROM Users WHERE Username='$unameEntry';" )->fetchAll(PDO::FETCH_COLUMN)[0];
				$_SESSION['login_lastName'] = $db->query( "SELECT LastName FROM Users WHERE Username='$unameEntry';" )->fetchAll(PDO::FETCH_COLUMN)[0];
				$_SESSION['login_email'] = $db->query( "SELECT Email FROM Users WHERE Username='$unameEntry';" )->fetchAll(PDO::FETCH_COLUMN)[0];
				$_SESSION['login_phoneNumber'] = $db->query( "SELECT Phone FROM Users WHERE Username='$unameEntry';" )->fetchAll(PDO::FETCH_COLUMN)[0];

				// To properly format the phone number:
				$_SESSION['login_phoneNumFormatted'] = substr(( $_SESSION['login_phoneNumber']), 0,3) . '-' . substr(( $_SESSION['login_phoneNumber']), 3,3) . '-' . substr(( $_SESSION['login_phoneNumber']), 6,4);
				$_SESSION['login_gender'] = $db->query( "SELECT Gender FROM Users WHERE Username='$unameEntry';" )->fetchAll(PDO::FETCH_COLUMN)[0];
				// To properly format the gender into a string we can show the user:
				if($_SESSION['login_gender'] === 1) {
					$_SESSION['login_genderFormatted'] = "Female";
				} else {
					$_SESSION['login_genderFormatted'] = 'Male';
				}

				$_SESSION['login_birthdate'] = $db->query( "SELECT Birthdate FROM Users WHERE Username='$unameEntry';" )->fetchAll(PDO::FETCH_COLUMN)[0];
				// To properly format the Birthdate:
				$_SESSION['login_bdayFormatted'] = substr(( $_SESSION['login_birthdate']), 0,4) . '/' . substr(( $_SESSION['login_birthdate']), 4,2) . '/' . substr(( $_SESSION['login_birthdate']), 6,2);
				$_SESSION['login_description'] = $db->query( "SELECT Description FROM Users WHERE Username='$unameEntry';" )->fetchAll(PDO::FETCH_COLUMN)[0];
				// header("Location: http://localhost/pnp/viewingPage.html");
				$success = True;

                // the response to the ajax call
				echo 'ValidCredentials';
			} else {
			 	$error = "Your Login Name or Password is invalid";
			}

		} catch (PDOException $e) {
			echo $e->getMessage();
			return $success;
		}
	}
?>
