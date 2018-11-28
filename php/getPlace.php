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

            $sql = "";
            if($space === "0") {
                $sql = "SELECT * FROM Places";
            } else {
                 $s0 = "SELECT * FROM Places WHERE Username not = '" . $usernamePerson . "'" ;
                $s1 = "AND TypeOfSpace ='" . $space . "'" ; 
                $s2 = " AND PricePerNight <=". $price . "";
                $s3 = " AND Pets =" . $pets . "";
                $s4 = " AND Alcohol =" . $alc . "";
                $s5 = " AND Wheelchair =" . $wheelchair . "";
                $s6 = " AND Smoking =" . $smoking . "";
                $s7 = " AND OutdoorAccess =" . $outdoors . "";

                $sql = $s0 . $s1 . $s2 . $s3 . $s4 . $s5 . $s6 . $s7;
            }
            
           

          
            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            // display search result for user
            print_r ($result);
            // if(count($result) == 0){
            //     echo "No results match your search...party pooper :(";
            // }
            // for($x=0, $n=count($result); $x<$n; $x++){
            //     echo "HEY";
        //             '<section class="placeContainer"
		// 				<div id="placeImage">
		// 					img!
		// 				</div>
		// 				<div class="details">
		// 					<div> Address: $result[$x]["Address"] </div>
		// 					<div>Description: $result[$x]["Desciption"]
		// 					</div>
		// 					<div>Price per night: $result[$x]["PricePerNight"]</div>
		// 				</div>
					
		// 				<div class = "userInfo">
		// 					<div>  
		// 							User: $result[$x]["FirstName"] $result[$x]["LastName"]
		// 							Rating: $result[$x]["Rating"]
		// 					</div>
		// 				</div>            
							
		// 				<div class="bookButton">
		// 					<button id = bookButton onclick = "showBooking()"> Book </button>
		// 						<div id= "book" style = "display: none">
		// 							<form method = "POST" action = "php/book_place.php">
		// 								Preferred Date:
		// 							<input type= "date" id="booking" name="bookDate" required>
		// 								<button type = "submit" id = "submitDate"> Check Date </button>
		// 							</form>
		// 						</div>
		// 				</div>
		// 			</section>

		// </section>';
            //}

        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}

?>
