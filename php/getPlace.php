<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "dgand";
$placeId = "995629BC7AF715D9A88B35FB28EE18D23C87F1AF707E1F685EC100839CFC84D9";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $space = $_POST['spaceType'];
    // $price = intval($_POST["price"]); 
    // $rating = floatval($_POST["rating"]);
    // $pets = (bool)$_POST["pets"];
    // $alc = (bool)$_POST["alcohol"];
    // $wheelchair = (bool)$_POST["wheelchair"];
    // $smoking = (bool)$_POST["smoking"];
    // $outdoors = (bool)$_POST["outdoors"];


try{ 
    
    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $stmt = $conn->prepare('SELECT * FROM Places WHERE TypeOfSpace= :space AND PricePerNight = :price AND Rating >= :rating  AND Pets = :pets  AND Alcohol = :alcohol  AND Wheelchair = :wheelchair  AND Smoking = :smoking  AND OutdoorAccess = :outdoors');
   //$stmt->execute(['space' => $space, 'price' => $price, 'rating' => $rating, 'pets' => $pets, 'alcohol' => $alc, 'wheelchair' => $wheelchair, 'smoking' => $smoking, 'outdoors' => $outdoors]);
   $stmt = $conn->prepare('SELECT * FROM Places WHERE TypeOfSpace = :space');
   $stmt->execute(['space' => "Home"]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result === False){
    echo "Query doesnt exist";
    }

    print_r($result['Desciption']);
}

catch(PDOException $e){
    echo "        u       ck";
    exit();
}
}

?>
