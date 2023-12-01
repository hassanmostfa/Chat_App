<?php

session_start();
if (!isset($_SESSION['unique_id'])) {
   header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Chat App | Users</title>
   <link rel="stylesheet" href="style.css">
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
   <div class="container">
      <section class="chat-area">
         <header>

            <?php
            include_once("./php/config.php");
            $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
            $sql = mysqli_query($connection, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if(mysqli_num_rows($sql) > 0){
               $row = mysqli_fetch_assoc($sql);
            }
            ?>

            <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="./php/images/<?php echo $row['img']?>" alt="">
            <div class="details">
               <span><?php echo $row['fname'] . " " . $row['lname']?></span>
               <p><?php echo $row['status']?></p>
         </header>
         <div class="chat-box"></div>
         <form action="#" method="POST" class="typing-area" >
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']?>" hidden>
            <input type="text" name="incoming_id" value="<?php echo $user_id?>" hidden>
            <input type="text" class="input-field" name="message" placeholder="Type a message here...">
            <button class="send-btn"><i class="fa-solid fa-paper-plane"></i></button>
         </form>
      </section>
   </div>

   <script src="js/chatting.js"></script>
</body>

</html>