let notifyLogin = document.querySelector('.notify-login')
let login = document.querySelector('.login')
let closeNotifyBtn = document.querySelector('.ti-close')
let inputPassword = document.querySelector('.login-input-item.password')
let signUpBtn = document.querySelector('.sign-up')
let bodyContainer = document.querySelector('.body-container')

//xử lý click mở form đăng ký đăng nhập
login.addEventListener('click', openNotifyLogin)
bodyContainer.addEventListener('click', closeNotifyLogin)
closeNotifyBtn.addEventListener('click', closeNotifyLogin)
inputPassword.addEventListener('keypress', function (e) {
    if (e.code === 'Enter') {
        alert('succes')
    }
})
function closeNotifyLogin() {
    notifyLogin.classList.add('close')
}
function openNotifyLogin() {
    notifyLogin.classList.remove('close')
}
