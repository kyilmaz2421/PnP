<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";


try {

	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $sql = "INSERT INTO Places VALUES ('{$_POST["username"]}', '{$_POST["firstname"]}', '{$_POST["lastname"]}','{$_POST["email"]}','{$_POST["password"]}','{$_POST["tel"]}','0','0','{$_POST["gender"]}','{$_POST["info"]}','{$_POST["bday"]}','0')";
		header('Location: http://localhost/pnp/viewingPage.html');
		exit();
    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
?>
