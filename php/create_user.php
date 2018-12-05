<?php
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
	    $query1 = "(Username, FirstName, LastName,	    Email, Password, Phone,	Gender, Description, Birthdate)";
	    $query2 = "VALUES (?, ?, ?,			    ?, ?, ?,			?, ?, ?)";

	    $query = $query0 . $query1 . $query2;

	    // Get post variables
	    // Following syntax for readability
	    $formArray = array();
	    $part1 = array($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email']);
	    $part2 = array($_POST['password'], $_POST['tel'], $_POST['gender'], $_POST['info'], $_POST['bday']);

	    $formArray = array_merge($part1, $part2);



	    try {
		// when we successfully insert data, redirect and start a session
			$result = $conn->prepare($query);
			if($result->execute($formArray)) {

		    	include("session.php");
				// make directory for user files
				// windows
				$userImgDir = 'C:\\xampp\\htdocs\\pnp\\place_images\\' . $part1[0] . '\\';
				// production/linux
				// $userImgDir = /var/www/html/pnp
				// OSX dev with xampp
				// $userImgDir = /Applications/XAMPP/htdocs/pnp/place_images/
				echo (mkdir($userImgDir));

		    	// start the session for the user
		    	// There is similar code in sign_up_page.php
		    	// Populate the session variables with respective user entries from the $_POST
		    	// array

		    	$_SESSION['login_user'] = $part1[0];
		    	$_SESSION['login_firstName'] = $part1[1];
		    	$_SESSION['login_lastName'] = $part1[2];
		    	$_SESSION['login_email'] = $part1[3];
		    	$_SESSION['login_phoneNumber]'] = $part2[1];

		    	// We formart the number nicely so that it is easily to print to the webpage
		    	$_SESSION['login_phoneNumFormatted'] = substr(( $_SESSION['login_phoneNumber']), 0,3) .
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

		    	$_SESSION['login_bdayFormatted'] = substr(( $_SESSION['login_birthdate']), 0,4) .
								'/' . substr(( $_SESSION['login_birthdate']), 4,2) .
						       		'/' . substr(( $_SESSION['login_birthdate']), 6,2);


		    		//	header('Location: http://localhost/pnp/views/viewingPage.php');

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
