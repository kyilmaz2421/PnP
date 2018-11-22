<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "dgand";
$placeId = "995629BC7AF715D9A88B35FB28EE18D23C87F1AF707E1F685EC100839CFC84D9";

try{ 
    
    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT * FROM Places WHERE Username = :username AND PlaceID = :placeId');
    $stmt->execute(['username' => $usernamePerson, 'placeId' => $placeId]);
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


?>
