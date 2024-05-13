function closeLogin() {
    const boxLogin = document.querySelector('#alert_mess_box span');
    boxLogin.remove(boxLogin);
  }

  const fieldPassword = document.getElementById("password");
  const eyeIcon = document.getElementById("icon-password");

  console.log(eyeIcon);

  function eyeClick() {
      let typePassword = fieldPassword.type == "password";

      if(typePassword) {
          showPassword();
      } else {
          hidePassword();
      }
  }

  function showPassword() {
    fieldPassword.setAttribute("type", "text");
    eyeIcon.setAttribute("class", "bi bi-eye-slash");
  }

  function hidePassword() {
    fieldPassword.setAttribute("type", "password");
    eyeIcon.setAttribute("class", "bi bi-eye");
  }