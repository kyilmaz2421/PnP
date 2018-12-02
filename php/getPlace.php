<?php
// session_start();
    include("../php/session.php");
   // echo ($_SESSION['login_user']);
// phpinfo();
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = $_SESSION['login_user'];
    // handle error thrown for dev
    if(isset($_SERVER['REQUEST_METHOD'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookDate = $_POST["bookDate"];
            $space = strval($_POST["spaceType"]);
            $price = intval($_POST["price"]); 
            $rating = floatval($_POST["rating"]);
            $pets = $_POST["pets"];
            $alc = intval($_POST["alcohol"]);
            $wheelchair = intval($_POST["wheelchair"]);
            $smoking = intval($_POST["smoking"]);
            $outdoors = intval($_POST["outdoors"]);
        try{ 
        
            $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Prepare the sql statement
            // keep in mind this is a security flaw
            // !!! fix before release TODO
            $sql = "";
            if($space === "0") {
                $sql = "SELECT * FROM Places";
            } else {
                $s0 = "SELECT * FROM Places WHERE PricePerNight = '". $price."' ";
                //AND PricePerNight <= '". $space ."' AND Pets ='". $pets ."' AND Alcohol = '". $alc ."' AND Wheelchair = '". $wheelchair ."'  
                // $s1 = "TypeOfSpace ='" . $space . "'" ; 
                // $s2 = " AND PricePerNight <=' ". $price . " '";
                // $s3 = " AND Pets = ' " . $pets . " ' ";
                // $s4 = " AND Alcohol = ' " . $alc . " ' ";
                // $s5 = " AND Wheelchair = ' " . $wheelchair . " ' ";
                // $s6 = " AND Smoking = ' " . $smoking . " ' ";
                // $s7 = " AND OutdoorAccess = ' " . $outdoors . " ' ";
                //. $s1 . $s2 . $s3 . $s4 . $s5 . $s6 . $s7
                $sql = $s0;
            }
            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
             if(count($result) == 0){
              echo "No results match your search...party pooper :(";
             }
          for($x=0, $n=count($result); $x<$n; $x++){
              echo '<section id="placeContainer"
                <div id="placeImage">
                    <img id ="pic" src = "http://localhost/pnp/img/house.jpeg" alt = "house"/>
                    </div>
                <div id="details">
                            <div id = "title" > <strong> '. $result[$x]["TypeOfSpace"] . ' , '. $result[$x]["Desciption"] .' </strong>  </div>
                            <br>
                        <div> '. $result[$x]["StreetName"] . ', ' . $result[$x]["City"]  .  ',  ' .$result[$x]["Province"]. '</div>
                        <br>
                        <br>
                        <div id= "price"> $ '. $result[$x]["PricePerNight"] .' CAD  per night </div>
                        <br>
                        <br>
                        <br>
                        <div id = "userInfo">
                        <div id = "rating">  
                            Rated  '. $result[$x]["Rating"] .'
                        </div>
                        <div id "host">
                            Hosted by '. $result[$x]["Username"] .'
                        </div>
                </div>
                        <form action="http://localhost/pnp/views/book.php" method="post">
                        <div>
                          <input type="hidden" name="placeId" value="'. $result[$x]["PlaceID"] .'">
                          <input type="hidden" name="owner" value="'. $result[$x]["Username"] .'">
                          <input  type="hidden"name="booker" value="'. $_SESSION['login_user'] .'">
                          <input  type="hidden" name="bookDate" value="'. $bookDate .'">
                           <button type="submit" id = "book"> Book </button>
                        </div>
                      </form>         
                        </div>
      
                      </section>';      
           } 
        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}
?>
