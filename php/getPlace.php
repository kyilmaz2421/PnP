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
            // query String var
            $sql = ""; // /the final query
            $columns = ""; // columns to query
            $conditionals = ""; // where conditions to meet

            // Loop through form data in POST
            // depending on the value from the form concatenate strings for sql query
            // this loop isn't generic and depends on the html ie name="TypeOfSpace"

            // remove bookDate because it's not part of the query
            unset($_POST['bookDate']);


            // key is the db column name
            // val is the row item
            // this for loop builds the sql string query
            // viewingPage.php contains the values that populate $_POST
            foreach($_POST as $key => $val) {
                // 0 means no. 1 means yes. -1 means either
                if($val === "0" || $val === "1" ) {
                    // only build the string when $conditionals is empty
                    if(strlen($conditionals) === 0) {
                        $conditionals .= $key . "=" . $val;
                    } else {
                        $conditionals .= " AND " . $key . "=" . $val;
                    }
                } else if ($val !== "-1") {
                    if(strlen($conditionals) === 0) {
                        // Rating and PricePerNight aren't '=' there greater than filters
                        if($key === "Rating") {
                            $conditionals .= $key . ">=" . $val;
                        } else if ($key === "PricePerNight") {
                            $conditionals .= $key . ">=" . $val;
                        } else {
                            $conditionals .= $key . "='" . $val . "'";
                        }
                    } else {
                        if($key === "Rating") {
                            $conditionals .= " AND " . $key . ">=" . $val;
                        } else if ($key === "PricePerNight") {
                            $conditionals .= " AND " . $key . ">=" . $val;
                        } else {
                            $conditionals .= " AND " . $key .  "='" . $val . "'";
                        }
                    }
                } // otherwise val === -1 and we do nothing
            }

            // build query string
            if(strlen($conditionals) === 0) {
                // All filters are specified
                $sql = "SELECT * FROM Places" . $conditionals;
            } else {
                $sql = "SELECT *  FROM Places WHERE " . $conditionals;
            }
            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
             if(count($result) == 0) {
              echo "No results match your search...party pooper :(";
             }

            /*
             * purpose: displays yes or no or any for 1, 0, -1 respectively
             * $array 2d array of resultset
             */
            function displayYN($intVal) {
                if($intVal === "-1") {
                    return "Any";
                } else if ($intVal === "0" ) {
                    return "No";
                } else {
                    return "Yes";
                }
            }

            // Displays the places search result from the filters the user specified
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
                        
                        <div id= "pets"> Pets Permitted: '. displayYN($result[$x]["Pets"]) .'  </div>
                        <div id= "alcohol"> Alcohol Permitted: '. displayYN($result[$x]["Alcohol"]) .'  </div>
                        <div id= "wheelchair"> Wheelchair Accessible: '. displayYN($result[$x]["Wheelchair"]) .'  </div>
                        <div id= "smoking"> Smoking Permitted: '. displayYN($result[$x]["Smoking"]) .'  </div>
                        <div id= "outdoors"> Outdoor Access: '. displayYN($result[$x]["OutdoorAccess"]).'  </div>
                        <br>
                        <div id = "userInfo"></div>
                        <div id = "rating">
                            Rated:  '. $result[$x]["Rating"] .'
                        </div>
                        <div id "host">
                            Hosted by: '. $result[$x]["Username"] .'
                        </div>
                        <ul> <div id= "price"> $ '. $result[$x]["PricePerNight"] .' CAD  per night </div> </ul>
                        <ul> <button type="submit" id = "book"> Book </button> </ul>
                        <form action="http://localhost/pnp/views/book.php" method="post">
                        <div>
                          <input type="hidden" name="placeId" value="'. $result[$x]["PlaceID"] .'">
                          <input type="hidden" name="owner" value="'. $result[$x]["Username"] .'">
                          <input  type="hidden"name="booker" value="'. $_SESSION['login_user'] .'">
                          <input  type="hidden" name="bookDate" value="'. $bookDate .'">
                        </div>
                      </form>
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
