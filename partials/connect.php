<?php
 $server = "localhost";
 $name = "root";
 $pass = "";
 $dbName = "users1";

 $connected = mysqli_connect($server, $name, $pass, $dbName);

 if(!$connected) {
     die("Error: " . mysqli_connect_error());
 }
?>
