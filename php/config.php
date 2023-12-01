<?php

$connection = mysqli_connect("localhost" , "hassan" , "secretpassword" , "chatapp");

if (!$connection) {
   echo "Not connected" . mysqli_connect_error();
}

?>