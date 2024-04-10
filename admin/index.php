<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Certificate Verification System</title>
    <link
      rel="shortcut icon"
      href="../assets/img/logo.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../assets/css/admincss.css" />
  </head>
  <body>
    <div class="container">
      <div class="form-div">
        <h3>Administrative Login</h3>

       <?php
        if(isset($_SESSION['message'])){
          echo '<div class="alert">
                <p>'.$_SESSION['message'].'</p>
              </div>';
          unset($_SESSION['message']);
        }
        ?>

        <form action="process-login.php" method="post">
          <div class="form-group">
            <i class="icon fas fa-envelope"></i>
            <input
              type="email"
              name="email"
              class="form-control"
              required
              placeholder="Email"
            />
          </div>
          <div class="form-group">
            <i class="icon fas fa-key"></i>
            <input
              type="password"
              name="password"
              class="form-control"
              required
              placeholder="Password"
              id="password"
            />
            <div style="display: inline" id="showpassword">
              <i class="icon fas fa-eye"></i>
            </div>
          </div>
          <button type="submit" name="login">
            <i class="icon fas fa-sign-in-alt"></i>
            Login
          </button>
        </form>
      </div>
    </div>
    <footer>
      <p style="color: white; text-align: center">
        Copyright&copy;
        <script>
          document.write(new Date().getFullYear());
        </script>
        Adamawa State Polytechnic, Yola.
      </p>
    </footer>
    <script>
      let togglePassword = document.getElementById("showpassword");
      let passwordField = document.getElementById("password");
      togglePassword.addEventListener("click", function (e) {
        const type =
          passwordField.getAttribute("type") === "password"
            ? "text"
            : "password";
        passwordField.setAttribute("type", type);
      });
    </script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/fontawesome/js/all.js"></script>
    <script src="../assets/js/script.js"></script>
  </body>
</html>
