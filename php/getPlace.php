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
                        <div class="details">
                        <div> <strong> '. $result[$x]["TypeOfSpace"] .' </strong> </div>
                        <div>  <strong> '. $result[$x]["Desciption"] .' </strong>  </div>';
                      
                        for($k=13, $j=count($result[$x]); $k<$j; $k++){
                            if($k== 13){
                                echo  ' <div> ';
                            }
                            if(strcmp($result[$x][$k],'0')){
                                $result[$x][$k]= "";
                            }
                            if($k== 17){
                                echo  ' </div> ';
                            }
                        }
                echo ' <div> '. $result[$x]["StreetName"] . ', ' . $result[$x]["City"]  .  ',  ' .$result[$x]["Province"]. '</div>
                        <div> '. $result[$x]["StreetName"] . ', ' . $result[$x]["City"]  .  ',  ' .$result[$x]["Province"]. '</div>

					<div> $ '. $result[$x]["PricePerNight"] .' CAD  per night </div>
                    </div> 
                    <div class = "userInfo">
                        <div>  
                                Hosted by: '. $result[$x]["Username"] .'
                        </div>
                        <div>
                            Rating: '. $result[$x]["Rating"] .'
                        </div>
                    </div>            
                    <div class="bookButton">
                    <button id = bookButton onclick = \'showBooking()\'> Book </button>
                        <div id= "book" style = "display: none">
                            <form method = "POST" action = "php/book_place.php">                        
                        </div>
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
