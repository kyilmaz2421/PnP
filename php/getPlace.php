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
            //$bookDate = $_POST["bookDate"];
            $space = strval($_POST["TypeOfSpace"]);
            $price = intval($_POST["PricePerNight"]);
            $rating = floatval($_POST["Rating"]);
            $pets = $_POST["Pets"];
            $alc = intval($_POST["Alcohol"]);
            $wheelchair = intval($_POST["Wheelchair"]);
            $smoking = intval($_POST["Smoking"]);
            $outdoors = intval($_POST["OutdoorAccess"]);
        try{

            $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Prepare the sql statement
            // keep in mind this is a security flaw
            // !!! fix before release TODO
            // query String var
            $sql = ""; // /the final query
            $columns = ""; // columns to query
            $conditionals = ""; // where conditions to meet

            // Loop through form data in POST
            // depending on the value from the form concatenate strings for sql query
            // this loop isn't generic and depends on the html ie name="TypeOfSpace"
            foreach($_POST as $key => $val) {
                // for ints in db
                // TODO can't have 1 be a rating cause this will get triggered
                if($val === "0" || $val === "1" ) {
                    // only build the string when $conditionals is empty
                    if(strlen($conditionals) === 0) {
                        $conditionals .= $key . "=" . $val;
                    } else {
                        $conditionals .= " AND " . $key . "=" . $val;
                    }
                } else if ($val === "-1") {
                    if(strlen($columns) === 0) {
                        $columns .= $key . " ";
                    } else {
                        $columns .= ", " . $key . " ";
                    }
                    // TypeOfSpace, Rating, and Price Have more potential values to handle
                } else {
                    if(strlen($conditionals) === 0) {
                        $conditionals .= $key . "='" . $val . "'";
                    } else {
                        $conditionals .= " AND " . $key .  "='" . $val . "'";
                    }
                }
            }

            if(strlen($conditionals) === 0) {
                $sql = "SELECT " . $columns . " FROM Places" . $conditionals;
            } else {
                $sql = "SELECT " . $columns . " FROM Places WHERE " . $conditionals;
            }

            echo ($sql);
            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
             if(count($result) == 0){
              echo "No results match your search...party pooper :(";
             }

// TODO get the result set and display it correctyl
// currently result data for displaying is incomplete.
// need to get the correct info for each respective placeId
// maybe use an ajax call
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
