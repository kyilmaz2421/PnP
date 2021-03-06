<?php
    // Purpose: Query the pnpdb and return the places that match the users search
    // Associated with viewingPage.php
    // Authors: Eric Anderson, Alana Ceci
    //

    // retain the user's session
    include("../php/session.php");
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
                            $conditionals .= $key . "<=" . $val;
                        } else {
                            $conditionals .= $key . "='" . $val . "'";
                        }
                    } else {
                        if($key === "Rating") {
                            $conditionals .= " AND " . $key . ">=" . $val;
                        } else if ($key === "PricePerNight") {
                            $conditionals .= " AND " . $key . "<=" . $val;
                        } else {
                            $conditionals .= " AND " . $key .  "='" . $val . "'";
                        }
                    }
                } // otherwise val === -1 and we do nothing
            }
            // build query string
            if(strlen($conditionals) === 0) {
                // All filters are specified
                // Don't load places of the person logged in
                $sql = "SELECT * FROM Places WHERE NOT Username = '" . $usernamePerson ."'" ;
            } else {
                $sql = "SELECT *  FROM Places WHERE NOT Username = '" . $usernamePerson . "'". " AND ". $conditionals;
            }

            // Get result set from db
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
             if(count($result) == 0) {
              echo  '<div id="noMatch">
              No places match your search...party pooper :(
              </div> ';
             }

             for($k=0, $t=count($result); $k<$t; $k++){
                $query =  "SELECT *  FROM Bookings WHERE PlaceID = '". $result[$k]["PlaceID"] . "' AND BookDate = '" . $bookDate . "' AND UsernameOwner = '" . $result[$k]["Username"] . "'";
                $queryBooking = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
                foreach ($queryBooking as $indexes) {
                    array_splice($result, $k, 1);
                    $t--;
                    break;
                }
             }

            /*
             * purpose: displays yes or no or any for 1, 0, -1 respectively
             * $array 2d array of resultset
             * This is a helper function form building the correct sql query
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
                $url = strval($result[$x]["ImgUrl"]) . "0.jpg";
                echo    '<section id="placeContainer"
                            <div id="placeImage">
                                <img id ="pic" src = ' . $url . ' alt = "house"/>
                            </div>

                            <div id = "details">
                            <div id = "title" > <strong>'. $result[$x]["TypeOfSpace"] . ' , '. $result[$x]["Description"] .'</strong>  </div>
                            <div> '. $result[$x]["StreetName"] . ', ' . $result[$x]["City"]  .  ',  ' .$result[$x]["Province"]. '</div>
                                <br>

                            <div id= "pets"> Pets Permitted: '. displayYN($result[$x]["Pets"]) .'  </div>
                            <div id= "alcohol"> Alcohol Permitted: '. displayYN($result[$x]["Alcohol"]) .'  </div>
                            <div id= "wheelchair"> Wheelchair Accessible: '. displayYN($result[$x]["Wheelchair"]) .'  </div>
                            <div id= "smoking"> Smoking Permitted: '. displayYN($result[$x]["Smoking"]) .'  </div>
                            <div id= "outdoors"> Outdoor Access: '. displayYN($result[$x]["OutdoorAccess"]).'  </div>
                                <br>
                            <div id = "rating">
                                Hosted by '. $result[$x]["Username"] .', rated '. $result[$x]["Rating"] .'
                            </div>
                            <div id= "price"> $ '. $result[$x]["PricePerNight"] .' CAD /night </div>
                                <br>
                            <form action="http://34.213.205.49/pnp/views/book.php" method="post">
                                <button type="submit" id = "book"> Book </button> </ul>
                                <input type="hidden" name="placeId" value="'. $result[$x]["PlaceID"] .'">
                                <input type="hidden" name="owner" value="'. $result[$x]["Username"] .'">
                                <input  type="hidden"name="booker" value="'. $_SESSION['login_user'] .'">
                                <input  type="hidden" name="bookDate" value="'. $bookDate .'">
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
