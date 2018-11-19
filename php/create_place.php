<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "cc98";



echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
}

try {

	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully"; 

	    $sql = "INSERT INTO Places VALUES ('{$usernamePerson}', '{$_POST["building"]}', '{$_POST["adr"]}','{$_POST["aptNum"]}','{$_POST["city"]}','{$_POST["province"]}','{$_POST["country"]}','{$_POST["postalCode"]}','{$_POST["spaceType"]}','{$_POST["description"]}','{$_POST["price"]}','0','{$_POST["pets"]}', '{$_POST["alcohol"]}','{$_POST["wheelchair"]}','{$_POST["smoking"]}','{$_POST["outdoors"]}', '1')";
	    
		$conn->exec($sql);

		header('Location: http://localhost/pnp/postSuccess.html');
		exit();

	    // $stmt = $conn->prepare("SELECT * FROM Places");

	    // $stmt->execute();
		
	    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    	// 	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        // 		echo $v;
   		//  }
	   
    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }

	echo "<h2>PHP is Fun!</h2>";
	echo "Hello world!<br>";
	echo "I'm about to learn PHP!<br>";
	echo "This ", "string ", "was ", "made ", "with multiple parameters.";
?>
