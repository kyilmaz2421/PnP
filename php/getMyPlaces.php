<?php
// Purpose: Display the users places
// Associated with: Profile.php
// Authors: Andrea Hyder

	include("../php/session.php");
?>
<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = $_SESSION['login_user'];


// Handle error thrown for dev
if(isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try{
            $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Set the username to the current logged in user:
            $username = $_SESSION['login_user'];
            // The sql query string:
            $sql = "SELECT * FROM Places WHERE Username = '$username'";

            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            // display search result for user
            myprint_r2 ($result);

        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}

/*
 * function to display the places of the current users
 * $result: the result set from the db query
 */
function myprint_r2($result) {

    for($x=0, $n=count($result); $x<$n; $x++){
		$url = (strval($result[$x]["ImgUrl"])) . "0.jpg";
        echo '
        <div id="placeImage">
            <img id ="pic" src = ' . $url . ' alt = "house" style="width: 25vw; height: 20vh;"/>
            </div>
                <div class="details">
                <div id = "title" > <strong> '. $result[$x]["TypeOfSpace"] . ' , '. $result[$x]["Description"] .' </strong>  </div>
            <div> '. $result[$x]["StreetName"] . ', ' . $result[$x]["City"]  .  ', ' .$result[$x]["Province"]. ', ' .$result[$x]["Country"] . ' ' .$result[$x]["PostalCode"].'</div>
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
            <br>
        </div>';

    }
}

?>
