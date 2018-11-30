<?php
// session_start();
<<<<<<< HEAD
    include("../php/session.php");
    echo ($_SESSION['login_user']);
?>
<?php
=======
	include("../php/session.php");
   // echo ($_SESSION['login_user']);
// phpinfo();

>>>>>>> 475cbd040f7e4794d8b19fd2582d1c2d1f18150e
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = $_SESSION['login_user'];
    // handle error thrown for dev
    if(isset($_SERVER['REQUEST_METHOD'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
<<<<<<< HEAD
            $space = $_POST['spaceType'];
=======
            $space = strval($_POST["spaceType"]);
>>>>>>> 475cbd040f7e4794d8b19fd2582d1c2d1f18150e
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
            $sql = "";
            if($space === "0") {
                $sql = "SELECT * FROM Places";
            } else {
                $s0 = "SELECT * FROM Places WHERE" ;
                $s1 = "TypeOfSpace ='" . $space . "'" ; 
                $s2 = " AND PricePerNight <=". $price . "";
                $s3 = " AND Pets =" . $pets . "";
                $s4 = " AND Alcohol =" . $alc . "";
                $s5 = " AND Wheelchair =" . $wheelchair . "";
                $s6 = " AND Smoking =" . $smoking . "";
                $s7 = " AND OutdoorAccess =" . $outdoors . "";
                $sql = $s0 . $s1 . $s2 . $s3 . $s4 . $s5 . $s6 . $s7;
            }
<<<<<<< HEAD
            
           
          
            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            // display search result for user
            print_r ($result);
=======
            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

             if(count($result) == 0){
              echo "No results match your search...party pooper :(";
             }
          for($x=0, $n=count($result); $x<$n; $x++){
              echo '<section class="placeContainer"
				<div id="placeImage">
					img!
					</div>
						<div class="details">
							<div> Address: '. $result[$x]["StreetName"] . ', ' . $result[$x]["City"]  .  ',  ' .$result[$x]["Province"]. '</div>
						<div>Description: '. $result[$x]["Desciption"] .'
						</div>
					<div>Price per night:  $ '. $result[$x]["PricePerNight"] .' CAD </div>
                    </div> 
                    <div class = "userInfo">
                        <div>  
                                User: aceci
                                Rating: 5
                        </div>
                    </div>            
                        
                    <div class="bookButton">
                        <button id = bookButton onclick = \'showBooking()\'> Book </button>
                            <div id= "book" style = "display: none">
                                <form method = "POST" action = "php/book_place.php">
                                    Preferred Date:
                                <input type= "date" id="booking" name="bookDate" required>
                                    <button type = "submit" id = "submitDate"> Check Date </button>
                                </form>
                            </div>
                    </div>
                </section>';
				
            } 
         //  myprint_r($result);
            
>>>>>>> 475cbd040f7e4794d8b19fd2582d1c2d1f18150e
        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}
<<<<<<< HEAD
=======

function myprint_r($my_array) {
    if (is_array($my_array)) {
        echo "<table border=1 cellspacing=0 cellpadding=3 width=100%>";
        echo '<tr><td colspan=2 style="background-color:#333333;"><strong><font color=white>ARRAY</font></strong></td></tr>';
        foreach ($my_array as $k => $v) {
                echo '<tr><td valign="top" style="width:40px;background-color:#F0F0F0;">';
                echo '<strong>' . $k . "</strong></td><td>";
                myprint_r($v);
                echo "</td></tr>";
        }
        echo "</table>";
        return;
    }
     echo $my_array;
}

>>>>>>> 475cbd040f7e4794d8b19fd2582d1c2d1f18150e
?>
