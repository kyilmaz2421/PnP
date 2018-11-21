<?php
// connection vars
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";

// querys string field vars
$unameEntry = "";
$passwordEntry="";
$loginCredentialsArray = [];

// put username and password entered into loginCredArr
echo $_SERVER['QUERY_STRING'];
parse_str($_SERVER['QUERY_STRING'], $loginCredentialsArray);
print_r($loginCredentialsArray);

$unameEntry = $loginCredentialsArray['username'];
$passwordEntry = $loginCredentialsArray['password'];

echo $unameEntry;
echo $passwordEntry;

try {
	    
	    // connect to db
	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully"; 

	    // query db if it has user's entries
	    $sql1 = "SELECT * FROM Users WHERE Username='"  . $unameEntry . "'";

	   


	    $dbUsername = $conn->query($sql1);

	    // echo $dbUsername;

	    // $dbPassword = $conn->query("SELECT Password FROM Users WHERE Password=" . $passwordEntry);

		var_dump($dbUsername);

		
	   
    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }

?>
