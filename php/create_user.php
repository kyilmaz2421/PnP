<?php
// Purpose: Create a users
// Associated with: index.php
// Authors: Eric Anderson
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";


try {
	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $sql = "INSERT INTO Places VALUES ('{$_POST["username"]}', '{$_POST["firstname"]}', '{$_POST["lastname"]}','{$_POST["email"]}','{$_POST["password"]}','{$_POST["tel"]}','0','0','{$_POST["gender"]}','{$_POST["info"]}','{$_POST["bday"]}','0')";

	    // Prepare sql query
	    $query0 = "INSERT INTO Users";
	    $query1 = "(Username, FirstName, LastName,	    Email, Password, Phone,		Gender, Description, Birthdate)";
	    $query2 = "VALUES (?, ?, ?,			    ?, ?, ?,			?, ?, ?)";

		// Concatenate query
	    $query = $query0 . $query1 . $query2;

	    // Get post variables and so we can populate the 'VALUES' in the query
	    // Following syntax for readability
	    $formArray = array();
	    $part1 = array($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email']);
	    $part2 = array($_POST['password'], $_POST['tel'], $_POST['gender'], $_POST['info'], $_POST['bday']);

	    $formArray = array_merge($part1, $part2);

	    try {
			// when we successfully insert data, we redirect and start a session
			$result = $conn->prepare($query);
			if($result->execute($formArray)) {

		    	include("session.php");
				// make directory for user files
				// windows
				//$userImgDir = 'C:\\xampp\\htdocs\\pnp\\place_images\\' . $part1[0] . '\\';
				// production/linux
			 	$userImgDir = '/var/www/html/pnp/place_images/' . $part1[0] . '/';
				// OSX dev with xampp
				// $userImgDir = /Applications/XAMPP/htdocs/pnp/place_images/
				echo($userImgDir);
				echo '<br>';
				echo (mkdir($userImgDir, 0775, true));

		    	// start the session for the user
		    	// There is similar code in sign_up_page.php
		    	// Populate the session variables with respective user entries from the $_POST
		    	// array

		    	$_SESSION['login_user'] = $part1[0];
		    	$_SESSION['login_firstName'] = $part1[1];
		    	$_SESSION['login_lastName'] = $part1[2];
		    	$_SESSION['login_email'] = $part1[3];
		    	$_SESSION['login_phoneNumber'] = strval($part2[1]);

		    	// We formart the number nicely so that it is easily to print to the webpage
		    	$_SESSION['login_phoneNumFormatted'] = substr( $_SESSION['login_phoneNumber'], 0,3) .
									'-' . substr(( $_SESSION['login_phoneNumber']), 3,3) .
							       		'-' . substr(( $_SESSION['login_phoneNumber']), 6,4);

		    				$_SESSION['login_gender'] = $part2[2];

		    	if($_SESSION['login_gender'] === 1) {
		    		$_SESSION['login_genderFormatted'] = "Female";
		    	} else {
		    		$_SESSION['login_genderFormatted'] = 'Male';
		    	}

		    	$_SESSION['login_description'] = $part2[3];

		    	// To properly format the Birthdate:
		    	$_SESSION['login_birthdate'] = $part2[4];
		    	$_SESSION['login_bdayFormatted'] = str_replace("-", "/", $_SESSION['login_birthdate']);

		    	header('Location: http://34.213.205.49/pnp/views/viewingPage.php');

		    	exit();
			}
	    } catch (PDOException $e) {
			echo ($e);
	    }
    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
?>
