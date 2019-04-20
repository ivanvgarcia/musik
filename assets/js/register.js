const hideLogin = document.querySelector(".hideLogin");
const hideRegister = document.querySelector(".hideRegister");
let loginForm = document.querySelector("#loginForm");
let registerForm = document.querySelector("#registerForm");

hideLogin.addEventListener("click", e => {
  loginForm.style.display = "none";
  registerForm.style.display = "block";
});

hideRegister.addEventListener("click", e => {
  loginForm.style.display = "block";
  registerForm.style.display = "none";
});
