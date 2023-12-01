<?php

session_start();
if (isset($_SESSION['unique_id'])) {
   include_once("config.php");
   $outgoing_id = mysqli_real_escape_string($connection, $_POST['outgoing_id']);
   $incoming_id = mysqli_real_escape_string($connection, $_POST['incoming_id']);
   $output = "";
   $sql = mysqli_query($connection, "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
   WHERE (incoming_msg_id = {$incoming_id} AND outgoing_msg_id = {$outgoing_id}) 
   OR (incoming_msg_id = {$outgoing_id} AND outgoing_msg_id = {$incoming_id})
   ORDER BY msg_id DESC") or die();

   while ($row = mysqli_fetch_assoc($sql)) {
      if ($row['incoming_msg_id'] === $outgoing_id) { // send message
         $output .= '<div class="chat incoming">
            <img src="./php/images/'.$row['img'].'" alt="">
            <div class="details">
               <p>'.$row['msg'].'</p>
            </div>
         </div>';
      }
      else{ // received message
         $output .= '<div class="chat outgoing">
            <div class="details">
               <p>'.$row['msg'].'</p>
            </div>
         </div>';
      }
   }
   echo $output;
}else{
   header("location: login.php");
}


?>