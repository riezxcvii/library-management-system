function viewPassword(n) {
  var passwordInput = document.getElementById("password");
  var passStatus = document.getElementById("eye");

  if (passwordInput.type == "password") {
    passwordInput.type = "text";
    passStatus.className = "fa fa-eye-slash";
  } else {
    passwordInput.type = "password";
    passStatus.className = "fa fa-eye";
  }
}
