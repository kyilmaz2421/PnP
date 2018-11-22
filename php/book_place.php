<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "bilbo";


if($_SERVER['REQUEST_METHOD'] === "POST"){
	$username = false;
		if(isset($_POST['bookDate'])){
			  echo $username = $_POST['bookDate'];
		}
		else{
				echo "fuck";
			   exit();
		}
}		  
try {   
	    // connect to db
	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	  	    // query db if it has user's entries
		$sql1 = "SELECT * FROM Users WHERE Username='"  . $usernamePerson . "'";


		// foreach ($conn->query($sql1) as $row) {
		// 	echo $row['FirstName '] . "\t";
		// }
		$stmt = $conn->query($sql1);
		foreach ($stmt as $row)
		{
			echo $row['FirstName'] . "\n";
		}

    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }


?>
