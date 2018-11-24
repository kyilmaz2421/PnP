<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "dgand";
$placeId = "995629BC7AF715D9A88B35FB28EE18D23C87F1AF707E1F685EC100839CFC84D9";

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

            print_r ($pets . "somethin " . $rating . " some " . $alc ." as");

        try{ 
        
        $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
        // set the PDO error mode to exception

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $stmt = $conn->prepare('SELECT * FROM Places WHERE TypeOfSpace= :space AND PricePerNight = :price AND Rating >= :rating  AND Pets = :pets  AND Alcohol = :alcohol  AND Wheelchair = :wheelchair  AND Smoking = :smoking  AND OutdoorAccess = :outdoors');

        // $stmt->execute([':space' => $space, 'price' => $price, 'rating' => $rating, 'pets' => $pets, 'alcohol' => $alc, 'wheelchair' => $wheelchair, 'smoking' => $smoking, 'outdoors' => $outdoors]);

        // $stmt = $conn->prepare('SELECT * FROM Places WHERE TypeOfSpace = :space');
        // $stmt->execute(['space' => "Home"]);

        // $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // // if result set not returned
        // if($result === null){
        //     // print_r ($stmt . "    ");
        //     print_r (gettype($stmt));
        //     echo "queryDNE";

        // } else {
        //     print_r(gettype($result));
        //     var_dump($result);
        //     echo " ";
        //     echo($result['smoking']);
        // }

        // Most of the db fields in this query are tiny in hence no single quotes
        // 

        $s0 = "SELECT * FROM Places WHERE TypeOfSpace ='" . $space . "'" ;
        $s1 = " AND PricePerNight <=". $price . "";
        $s2 = " AND Pets =" . $pets . "";
        $s3 = " AND Alcohol =" . $alc . "";
        $s4 = " AND Wheelchair =" . $wheelchair . "";
        $s5 = " AND Smoking =" . $smoking . "";
        $s6 = " AND OutdoorAccess =" . $outdoors . "";

        $sql = $s0 . $s1 . $s2 . $s3 . $s4 . $s5 . $s6;

        // $result = $conn->query("SELECT * FROM Places WHERE TypeOfSpace ='" . $space . "'" AND PricePerNight ="" . $price . "" AND Pets ="" . $pets . "" AND Alcohol = "" . $alc . "" AND Wheelchair = "" . $wheelchair . "" AND Smoking = "" . $smoking . "" AND OutdoorAccess = "" . $outdoors . "")->fetchAll(PDO::FETCH_ASSOC);
        print_r ($sql);
        $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        print_r ($result);
        var_dump($result);
        echo 'here';

        

        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}

?>
