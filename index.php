<?php
session_start();
if(isset($_SESSION['unique_id'])){ // if user is already logged in
   header("location: users.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Chat App</title>
   <link rel="stylesheet" href="style.css">
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <div class="container">
      <section class="form signup">
         <header>Chat App</header>
         <form action="#" enctype="multipart/form-data">
            <div class="error-txt"></div>
            <div class="name-details">
               <div class="field ">
                  <label>First Name</label>
                  <input type="text" name="fname" placeholder="First Name">
               </div>
               <div class="field">
                  <label>Last Name</label>
                  <input type="text" name="lname" placeholder="Last Name" >
               </div>
            </div>
            <div class="field">
               <label>Email Address</label>
               <input type="text" name="email" placeholder="Enter your email" >
            </div>
            <div class="field">
               <label>Password</label>
               <input type="password" name="password" placeholder="Enter new password" >
               <i class="fas fa-eye"></i>
            </div>
            <div class="field">
               <label>Select Image</label>
               <input type="file" name="image" >
            </div>
            <div class="field">
               <input type="submit" class="button" value="Continue To Chat" >
            </div>
         </form>
         <div class="link">Already signed up? <a href="login.php">Login now</a></div>
      </section>
   </div>

   <script src="js/pass-show-hide.js"></script>
   <script src="js/sign_up.js"></script>
</body>
</html>