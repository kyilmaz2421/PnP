<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "dgand";
$placeId = "995629BC7AF715D9A88B35FB28EE18D23C87F1AF707E1F685EC100839CFC84D9";

    // handle error thrown for dev
    if(isset($_SERVER['REQUEST_METHOD'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $space = $_POST['spaceType'];
            $price = intval($_POST["price"]); 
            $rating = floatval($_POST["rating"]);
            $pets = $_POST["pets"];
            $alc = $_POST["alcohol"];
            $wheelchair = $_POST["wheelchair"];
            $smoking = $_POST["smoking"];
            $outdoors = $_POST["outdoors"];

        try{ 
        
            $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the sql statement
            // keep in mind this is a security flaw
            // !!! fix before release TODO
            $s0 = "SELECT * FROM Places WHERE TypeOfSpace ='" . $space . "'" ;
            $s1 = " AND PricePerNight <=". $price . "";
            $s2 = " AND Pets =" . $pets . "";
            $s3 = " AND Alcohol =" . $alc . "";
            $s4 = " AND Wheelchair =" . $wheelchair . "";
            $s5 = " AND Smoking =" . $smoking . "";
            $s6 = " AND OutdoorAccess =" . $outdoors . "";

            $sql = $s0 . $s1 . $s2 . $s3 . $s4 . $s5 . $s6;

          
            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            // display search result for user
            print_r ($result);

        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}

?>
