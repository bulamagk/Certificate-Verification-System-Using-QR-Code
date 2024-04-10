<?php
require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Certificate Verification Page</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link
      rel="shortcut icon"
      href="./assets/img/logo.png"
      type="image/x-icon"
    />
  </head>
  <body>
    <div class="container">
      <div class="logo-div">
        <img src="./assets/img/logo.png" alt="" />
      </div>
      <h1>Certificate Verification</h1>
      <div class="form-div">

        <?php
        if(isset($_SESSION['message'])){
          echo '<div class="alert">
                <p style ="text-align:center">Certificate Not Found for '.$_SESSION['message'].'</p>
              </div>';
          unset($_SESSION['message']);
        }
        ?>

        <form action="process.php" method="get">
          <div class="form-group">
            <label for="">Enter Matriculation Number</label>
            <input
              name="matricno"
              class="form-control"
              type="text"
              required
            />
          </div>
          <div class="form-group">
            <button type="submit">Verify <i class="fas fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>
    <footer>
      <p>
        Copyright&copy;
        <script>
          document.write(new Date().getFullYear());
        </script>
        Adamawa State Polytechnic, Yola.
      </p>
    </footer>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/fontawesome/js/all.js"></script>
  </body>
</html>
