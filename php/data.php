<?php

while ($row = mysqli_fetch_assoc($sql)) {
   $sql2 = mysqli_query($connection, "SELECT * FROM messages WHERE 
   (incoming_msg_id = {$row['unique_id']} AND outgoing_msg_id = {$_SESSION['unique_id']})
   OR (incoming_msg_id = {$_SESSION['unique_id']} 
   AND outgoing_msg_id = {$row['unique_id']}) 
   ORDER BY msg_id DESC limit 1") or die();
   $row2 = mysqli_fetch_assoc($sql2);
   if(mysqli_num_rows($sql2) > 0){
      $result = $row2['msg'];
   }else{
      $result = "No message available";
   }
   // Triming the message
   (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
   //Adding you if you sent the message
   @($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You : " : $you = "";
   
   // check user is online or offline
   $row['status'] == "Offline Now" ? $offline = "offline" : $offline = "";

   $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                     <div class="content">
                        <img src="php/images/' . $row['img'] . '" alt="">
                        <div class="details">
                           <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                           <p>' .$you. $msg . '</p>
                        </div>
                     </div>
                     <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                  </a>';
   }

?>