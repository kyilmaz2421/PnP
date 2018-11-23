<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "dgand";
$placeId = "995629BC7AF715D9A88B35FB28EE18D23C87F1AF707E1F685EC100839CFC84D9";
if( isset( $_POST['space'] ) )
{
echo '  <section class="placeContainer">
                <div id="placeImage">
                        <img id= "image" src="img/house.jpeg" alt="House">
                </div>
            
                <div id="details">
                    <div>Address:</div>
                    <div>Description:</div>
                    <div>Price per night:</div>
                </div>
            
                <div id = "userInfo">
                    <div id = "user">  
                            User:
                    </div>
                    <div id = "rating">
                            Rating: 
                    </div>
                </div>
            </section>
            <form  method="POST" action="http://localhost/pnp/php/getPlace.php">
                <button type="submit"  name= "test" id = "bookPlace"> Book </button>
            </form>
        </section>
';
}
else{
    echo 'fuck';
}
try{ 
    
    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT * FROM Places WHERE TypeOfSpace= :space AND PlaceID = :placeId');
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
