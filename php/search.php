<?php

session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];

$searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);
$output = "";
$sql = mysqli_query($connection, "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'");
if (mysqli_num_rows($sql) > 0) {
   include "data.php";
} else {
   $output .= "No Users are Found";
}
echo $output;



?>