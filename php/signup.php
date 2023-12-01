<?php

session_start();
include_once("config.php") ;

$fname = mysqli_real_escape_string($connection , $_POST['fname']);
$lname = mysqli_real_escape_string($connection , $_POST['lname']);
$email = mysqli_real_escape_string($connection , $_POST['email']);
$password = mysqli_real_escape_string($connection , $_POST['password']);


if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
   if (filter_var($email , FILTER_VALIDATE_EMAIL)) {
      // check email exist in database or not 
      $sql = mysqli_query($connection , "SELECT email FROM users WHERE email = '{$email}'") ;
      if (mysqli_num_rows($sql) > 0) { // already exist
         echo "$email - This is already exist!" ;
      }else {
         // check user upload file
         if (isset($_FILES['image'])){ // file uploaded
            $img_name = $_FILES['image']['name'] ; // get img name
            $tmp_name = $_FILES['image']['tmp_name'] ; // this temperory name for move/save file in our folder

            // explode image and get the last extention
            $img_explode = explode("." , $img_name) ;
            $img_ext = end($img_explode); // we get extention

            $extentions = ['png' , 'jpeg' , 'jpg']; // valid extentions
            if(in_array($img_ext , $extentions) === true){
               $time = time() ; // current time

               //move image to out private folder
               $new_img_name = $time.$img_name ;
               
               if (move_uploaded_file($tmp_name , "images/".$new_img_name)) {
                  $status = "Active Now" ;
                  $random_id = rand(time() , 100000000) ;

                  // insert user data in the database
                  $sql2 = mysqli_query($connection , "INSERT INTO users (unique_id , fname , lname , email , password , img , status) 
                  VALUES({$random_id} , '{$fname}' , '{$lname}' , '{$email}' , '{$password}' , '{$new_img_name}' , '{$status}');");
                  if ($sql2) { // if data inserted
                     $sql3 = mysqli_query($connection , "SELECT * FROM users WHERE email = '{$email}'"); 
                     if (mysqli_num_rows($sql3) > 0) {
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['unique_id'] = $row['unique_id']; 
                        echo "success";
                     }
                  }else {
                     echo "Something went wrong" ;
                  }
               }
            }
         }else {
            echo "Please select an image file!";
         }
      }
   }else {
      echo "$email - This email is not valid " ;
   }
}else{
   echo "All fields are required" ;
}
