const form = document.querySelector('.typing-area');
const inputField = document.querySelector('.input-field');
const sendBtn = document.querySelector('.send-btn');
const chatBox = document.querySelector('.chat-box');
form.onsubmit = (e) => {
   e.preventDefault();
}
sendBtn.onclick = () => {
   let xhr = new XMLHttpRequest(); //Create xml object
   xhr.open("POST" , "php/insert-chat.php" , true);
   xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE){
         if (xhr.status === 200) {
            inputField.value = "";
         }
      }
   }
   let formData = new FormData(form);
   xhr.send(formData);
}

setInterval(() => {
   let xhr = new XMLHttpRequest(); //Create xml object
   xhr.open("POST" , "php/get-chat.php" , true);
   xhr.onload = () =>{
      if (xhr.readyState === XMLHttpRequest.DONE){
         if (xhr.status === 200) {
            let data = xhr.response;
            chatBox.innerHTML = data;
         }
      }
   }
   let formData = new FormData(form);
   xhr.send(formData);
} , 500);



