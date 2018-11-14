<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$firstName = "Alana";
$lastName = "Ceci";
$email = "livelaughlove98@yahoo.com";
$usernamePerson = "cc98";
$phone= 4204204209;
$rating = 5;
$numOfRating = 10000;
$gender = True;
$description = "Alana was born and raised in East Missisisspspsi. Her goal in life to host partayss that remind her of home";
$birthdate = "19980621";
$numOfPlaces = 2;


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
		
	    $sql = "INSERT INTO Users VALUES ('{$usernamePerson}', '{$firstName}', '{$lastName}','{$email}','{$password}','{$phone}','{$rating}','{$numOfRating}','{$gender}','{$description}','{$birthdate}','{$numOfPlaces}')";
	    
	    $conn->exec($sql);

	    $stmt = $conn->prepare("SELECT * FROM Users");

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

	echo "<h2>PHP is Fun!</h2>";
	echo "Hello world!<br>";
	echo "I'm about to learn PHP!<br>";
	echo "This ", "string ", "was ", "made ", "with multiple parameters.";
?>
