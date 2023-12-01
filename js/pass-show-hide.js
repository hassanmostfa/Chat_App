const passwordField = document.querySelector('.form input[type="password"]');
const toggleIcon = document.querySelector('.form .field i');


// Toggles the visibility of the password field.
const togglePassword = () => {
   if (passwordField.type === 'password') {
      passwordField.type = 'text';
      toggleIcon.classList.add('fa-eye-slash');
      toggleIcon.classList.remove('fa-eye');
      toggleIcon.style.color = '#000';

   } else {
      passwordField.type = 'password';
      toggleIcon.classList.add('fa-eye');
      toggleIcon.classList.remove('fa-eye-slash');
      toggleIcon.style.color = '#ccc';

   }
};
toggleIcon.addEventListener('click', togglePassword);

