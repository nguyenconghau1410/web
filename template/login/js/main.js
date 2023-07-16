let openSignUp = document.querySelector('.sign-up-form')
let signUp = document.querySelector('.sign-up')
let hideLogin = document.querySelector('.login-form')


signUp.addEventListener('click', function () {
    openSignUp.classList.add('open')
    hideLogin.classList.remove('open')
})