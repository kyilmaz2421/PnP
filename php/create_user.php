<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "cc98";


try {

	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully"; 

	    $sql = "INSERT INTO Places VALUES ('{$usernamePerson}', '{$_POST["building"]}', '{$_POST["adr"]}','{$_POST["aptNum"]}','{$_POST["city"]}','{$_POST["province"]}','{$_POST["country"]}','{$_POST["postalCode"]}','{$_POST["spaceType"]}','{$_POST["description"]}','{$_POST["price"]}','0','{$_POST["pets"]}', '{$_POST["alcohol"]}','{$_POST["wheelchair"]}','{$_POST["smoking"]}','{$_POST["outdoors"]}', '1')";
	    
	    $conn->exec($sql);

	    $stmt = $conn->prepare("SELECT * FROM Places");

	    $stmt->execute();
		
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        		echo $v;
   		 }
	   
    }
catch(PDOException $e)
    {
    	exit();
    }
?>
