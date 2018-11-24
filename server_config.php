<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'pnpdbpassword1');
   define('DB_DATABASE', 'pnpdb');
   $db = new PDO("mysql:host=localhost;dbname=pnpdb", "root", "pnpdbpassword1");
?>