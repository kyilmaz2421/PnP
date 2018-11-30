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
        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}
?>
