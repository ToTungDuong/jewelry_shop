// Get references to the tab elements and form containers
const formTitle = document.getElementById("formTitle");
const loginTab = document.getElementById("loginTab");
const signupTab = document.getElementById("signupTab");
const loginForm = document.getElementById("loginForm");
const signupForm = document.getElementById("signupForm");

// Add click event listeners to the tab elements
loginTab.addEventListener("click", showLoginForm);
signupTab.addEventListener("click", showSignupForm);

// Function to show the login form and hide the signup form
function showLoginForm(event) {
  event.preventDefault();

  loginTab.classList.add("tab_active");
  signupTab.classList.remove("tab_active");
  loginForm.style.display = "block";
  signupForm.style.display = "none";
  formTitle.textContent = "Login Form";
}

// Function to show the signup form and hide the login form
function showSignupForm(event) {
  event.preventDefault();

  signupTab.classList.add("tab_active");
  loginTab.classList.remove("tab_active");
  signupForm.style.display = "block";
  loginForm.style.display = "none";
  formTitle.textContent = "Signup Form";
}
