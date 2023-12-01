<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Chat App | Login</title>
   <link rel="stylesheet" href="style.css">
   <!-- Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
   <div class="container">
      <section class="form login">
         <header>Chat App</header>
         <form action="#" method="POST">
            <div class="error-txt"></div>
            <div class="field">
               <label>Email Address</label>
               <input type="text" name="email" placeholder="Enter Your Email">
            </div>
            <div class="field">
               <label>Password</label>
               <input type="password" name="password" placeholder="Enter Your Password">
               <i class="fas fa-eye"></i>
            </div>
            <div class="field">
               <input type="submit" class="button" value="Continue To Chat">
            </div>
         </form>
         <div class="link">Not yet signed up? <a href="index.php">signup now</a></div>
      </section>
   </div>

      <script src="js/pass-show-hide.js"></script>
      <script src="js/login.js"></script>

</body>

</html>