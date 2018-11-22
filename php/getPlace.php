<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "cc98";

try{ 
    echo "conecef3w4ted suces2do2";
    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
        // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conected suces2do2";
     $results = $conn->fetch("SELECT * FROM Places");
    $resultsArray = $results->fetch_assoc();

    while($row = $result->fetch_assoc()){
       echo $row;
     }
    
}

catch(PDOException $e){
    echo "u       ck";
    exit();
}


?>
