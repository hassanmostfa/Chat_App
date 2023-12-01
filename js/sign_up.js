const form = document.querySelector(".signup form") ,
continueBtn  = form.querySelector(".button") ;
const errorText = document.querySelector(".error-txt");

form.onsubmit = (e) => {
   e.preventDefault() ; // prevent form from submition
}

continueBtn.onclick = () => {
   // let's start ajax
   let xhr = new XMLHttpRequest(); //Create xml object
   xhr.open("POST" , "php/signup.php" , true);
   xhr.onload = () =>{
      if (xhr.readyState === XMLHttpRequest.DONE){
         if (xhr.status === 200) {
            let data = xhr.response;
            if (data == "success"){
               location.href = 'users.php';
            }else{
               errorText.textContent = data ;
               errorText.style.display = "block" ;
            }
         }
      }
   }
   // send the form data to php
   let formData = new FormData(form);

   xhr.send(formData) // send the form data to php;
}




