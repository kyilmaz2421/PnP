<?php
// session_start();
	include("../php/session.php");
	echo ($_SESSION['login_user']);
?>

<?php
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
		//echo $placeId;
	    $sql = "INSERT INTO Places VALUES ('{$usernamePerson}', '{$placeId}', '{$_POST["adr"]}','{$_POST["aptNum"]}','{$_POST["city"]}','{$_POST["province"]}','{$_POST["country"]}','{$_POST["postalCode"]}','{$_POST["spaceType"]}','{$_POST["description"]}','{$_POST["price"]}','0','0','{$_POST["pets"]}', '{$_POST["alcohol"]}','{$_POST["wheelchair"]}','{$_POST["smoking"]}','{$_POST["outdoors"]}')";
	    
		$conn->exec($sql);

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


?>
