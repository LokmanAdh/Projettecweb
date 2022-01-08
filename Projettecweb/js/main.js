const passIcon = document.querySelector('.pass-icon');
const password = document.querySelector('#password');

passIcon.addEventListener('click', function(e){
    const type = password.getAttribute('type') === 'text' ? 'password' : 'text';

    password.setAttribute('type', type);
    
    this.classList.toggle('fa-eye-slash');
} );
