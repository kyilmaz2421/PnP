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


// function myprint_r($my_array) {
//     if (is_array($my_array)) {
//         echo "<table border=1 cellspacing=0 cellpadding=3 width=100%>";
//         echo '<tr><td colspan=2 style="background-color:#333333;"><strong><font color=white>ARRAY</font></strong></td></tr>';
//         foreach ($my_array as $k => $v) {
//                 echo '<tr><td valign="top" style="width:40px;background-color:#F0F0F0;">';
//                 echo '<strong>' . $k . "</strong></td><td>";
//                 myprint_r($v);
//                 echo "</td></tr>";
//         }
//         echo "</table>";
//         return;
//     }
//     echo $my_array;
// }

function myprint_r2($my_array) {
    foreach ($my_array as $k => $v) {
        echo '<div style="border-style: solid; border-width: 1px;">';
        foreach($v as $x => $x_value) {
            // Don't need this to show since you are always the owner:
            // if ($x == "Username") {
            //     echo "Owner: " . $x_value;
            //     echo "<br>";
            // }
            if ($x == "StreetNumber") {
                echo $x_value;
            }
            if ($x == "StreetName") {
                echo " " . $x_value;
            }
            if ($x == "ApartmentNumber") {
                echo " Apt. " . $x_value;
                echo "<br>";
            }
            if ($x == "City") {

            }
            if ($x == "Province") {
                
            }
            if ($x == "Country") {
                
            }
            if ($x == "PostalCode") {
                
            }
            if ($x == "TypeOfSpace") {
                
            }
            if ($x == "Description") {
                
            }
            if ($x == "PrivePerNight") {
                
            }
            if ($x == "Rating") {
                
            }
            if ($x == "Pets") {
                
            }
            if ($x == "Alcohol") {
                
            }
            if ($x == "Wheelchair") {
                
            }
            if ($x == "Smoking") {
                
            }
            if ($x == "OutdoorAccess") {
                
            }
            if ($x == "Availabilities") {
                
            }
        }
        echo '</div>';
    }
    return;
}

?>


<script>
    
</script>