<?php

    $servername = "localhost";
    $usernamedb = "root";
    $password = "pnpdbpassword1";
    $usernamePerson = "cc98";
    $database="pnpdb";
    $mysqli = new mysqli($servername, $usernamedb, $password, $database);
    @mysql_select_db($username) or die("Connection faled");
        $query ="SELECT * FROM Users";
        $result= $mysqli->query($query); //content of table stored in array $result
        $num=$mysqli->mysqli_num_rows($result); //number of rows
        $i=0;
        while($i<$num){
            
            $i++;
        }


?>
