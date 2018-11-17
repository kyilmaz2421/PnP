<?php
// connection vars
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";

// querys string field vars
$unameEntry = "";
$passwordEntry="";

echo implode(" ", $_SERVER);


try {

	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully"; 
		
	    $dbUsername = $conn->query("SELECT Username FROM Users");
	    $dbPassword = $conn->query("SELECT Password FROM Users");

		var_dump($dbUsername);

	    $stmt->execute();
		
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        		echo $v;
   		 }
	   
    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }

?>
