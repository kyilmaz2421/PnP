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
            print_r ($result);

        } catch(PDOException $e) {
            echo $e;
            exit();
        }
    }
}

?>