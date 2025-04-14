// Открытие и закрытие модальных окон
var registerModal = document.getElementById("registerModal");
var loginModal = document.getElementById("loginModal");
var loginBtn = document.getElementById("loginBtn");
var closeRegisterModal = document.getElementById("closeRegisterModal");
var closeLoginModal = document.getElementById("closeLoginModal");
var loginLink = document.getElementById("loginLink");

loginBtn.onclick = function() {
    registerModal.classList.add("show");
}

closeRegisterModal.onclick = function() {
    registerModal.classList.remove("show");
}

closeLoginModal.onclick = function() {
    loginModal.classList.remove("show");
}

loginLink.onclick = function() {
    registerModal.classList.remove("show");
    loginModal.classList.add("show");
}

window.onclick = function(event) {
    if (event.target == registerModal || event.target == loginModal) {
        registerModal.classList.remove("show");
        loginModal.classList.remove("show");
    }
}
