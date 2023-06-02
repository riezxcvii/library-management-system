function viewNewPassword() {
  var passwordInput = document.getElementById("newPassword");
  var passStatus = document.getElementById("eye");

  if (passwordInput.type == "password") {
    passwordInput.type = "text";
    passStatus.className = "fa fa-eyes-slash";
  } else {
    passwordInput.type = "password";
    passStatus.className = "fa fa-eye";
  }
}
