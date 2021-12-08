const signInBtn = document.querySelector(".signIn-btn");
const signUpBtn = document.querySelector(".signUp-btn");
const formBox = document.querySelector(".form-box");
const container = document.querySelector(".container");

const alert = document.querySelector(".alert");
const closeAlert = document.querySelector(".close");

signUpBtn?.addEventListener("click", () => {
    formBox.classList.add("active");
    container.classList.add("active");
});

signInBtn?.addEventListener("click", () => {
    formBox.classList.remove("active");
    container.classList.remove("active");
});

closeAlert.addEventListener("click", () => {
    alert.classList.remove("active");

    window.history.pushState(null, null, window.location.href.split("?")[0]);
});
