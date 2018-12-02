<?php
    include("../php/session.php");
    // include("php/sign_in_page.php");
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
            $sql = "SELECT * FROM Bookings WHERE UsernameClient = '$username'";
            
            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            // display search result for user
            myprint_r ($result);

        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}

function myprint_r($result) {

    // Today's date:
    $today = date("Y-m-d");

    // Counter to check that there is at least one booking:
    $counter = 0;

    for($x=0, $n=count($result); $x<$n; $x++){

        // Only show the place if the date is after today's date (or on today):
        if ($result[$x]["BookDate"] >= $today) {

            // Make the counter not null, so that we don't show the "no bookings" message:
            $counter ++;

            try{ 
                $servername = "localhost";
                $usernamedb = "root";
                $password = "pnpdbpassword1";
                $usernamePerson = $_SESSION['login_user'];
                $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Search Places DB for place with corresponding PlaceID so we can print the info:
                $placeID = $result[$x]["PlaceID"];
                $sql = "SELECT * FROM Places WHERE PlaceID = '$placeID'";
                $place = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            } catch(PDOException $e) {
                echo $e;
                exit();
            }

            echo '
            <div id="placeImage">
                <img id ="pic" src = "http://localhost/pnp/img/house.jpeg" alt = "house"/>
            </div>
            <div class="details">
                <div id = "title" > 
                    <strong> '. $result[$x]["BookDate"] .' </strong>  
                </div>
                <div> 
                    ' . $place[0]["StreetName"] . 
                    '<br> Host: '. $result[$x]["UsernameOwner"] .'
                </div>
                <div> 
                    $ '. $place[0]["PricePerNight"] .' CAD  per night 
                </div>
            </div> 
            <div class = "userInfo">
                <div>
                    Rating: '. $place[0]["Rating"] .'
                </div>
            </div>    
            <br>';

        }
    } 

    // If there were no places, give the user a message:
    if ($counter == 0) {
        echo 'You have no upcoming bookings.';
    }
}

?>