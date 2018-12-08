<?php

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
try {


	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully ";
		$placeId = randomGen();

		$placeId = strtoupper($placeId);

		$imgDir = generateImgUrl($usernamePerson, $placeId);
		// execute a bash script create a dir for this file and put the user's file in it after renameing the file

		$rootPath = __DIR__; // gets the root of the current project from from C:\ or /
		//$uploaddir = "" . $rootPath . '/place_images/' . $usernamePerson . '/' . $placeId . '/';
		//$uploaddir = 'C:\\xampp\\htdocs\\pnp\\place_images\\' . $usernamePerson . '\\' . $placeId . '\\';
		$uploaddir = '/var/www/html/pnp/place_images/' . $usernamePerson . '/' . $placeId . '/';
		$_FILES['photos1']['name'] = "0.jpg";
		$uploadfile = $uploaddir . basename($_FILES['photos1']['name']);
		echo '<br> dir';
		var_dump($_FILES);
		mkdir($uploaddir, 0775, true);	
		move_uploaded_file($_FILES['photos1']['tmp_name'], $uploadfile);

		//echo $placeId;
	    $sql = "INSERT INTO Places VALUES ('{$usernamePerson}',
			 								'{$placeId}',
											 '{$_POST["adr"]}',
											 '{$_POST["aptNum"]}',
											 '{$_POST["city"]}',
											 '{$_POST["province"]}',
											 '{$_POST["country"]}',
											 '{$_POST["postalCode"]}',
											 '{$_POST["spaceType"]}',
											 '{$_POST["description"]}',
											 '{$_POST["price"]}',
											 '0',
											 '0',
											 '{$_POST["pets"]}',
											 '{$_POST["alcohol"]}',
											 '{$_POST["wheelchair"]}',
											 '{$_POST["smoking"]}',
											 '{$_POST["outdoors"]}',
											 '{$imgDir}')";

		$conn->exec($sql);

		//header('Location: http://34.213.205.49/pnp/views/postSuccess.php');
		exit();

    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
	}
	function randomGen() {
		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$length = strlen($chars);
		$random = "";

		for ($i = 0; $i < 50; $i++) {
			$random = $random . $chars[rand(0, $length - 1)];
		}

		return $random;
	}

	/*
	 * purpose: generate the url for the imgs the user uploads
	 * params: none
	 */
	 function generateImgUrl($uname, $pId) {
		return "http://34.213.205.49/pnp/place_images/" . $uname . "/" . $pId . "/";
	 }

?>
