<?php

session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = mysqli_query($connection, "SELECT * FROM users");
$output = "" ;

if (mysqli_num_rows($sql) == 1) {
   $output = "No Users are Found"; 
}elseif (mysqli_num_rows($sql) > 0) {
      include "data.php";
   }

   echo $output;

?>