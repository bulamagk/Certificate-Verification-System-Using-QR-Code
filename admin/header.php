<?php require_once '../connection.php';
if(!isset($_SESSION['login'])){
  header('location: index.php');
}
?>
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
  <body id="adminbody">
    <aside id="aside">
      <div class="logo">
        <img src="../assets/img/logo.png" alt="" />
      </div>
      <p class="dashboard-text"><i class="fas fa-home"></i> &nbsp; Dashboard</p>
      <h4><i class="fas fa-certificate"></i> &nbsp; Manage Certificates</h4>
      <hr />
      <div class="divider">
        <li id="addCertificate">
          <a href="add-certificate.php"><i class="fas fa-plus"></i> &nbsp; Add Certificate</a>
        </li>
        <li>
          <a href="view-certificate.php"><i class="fas fa-list"></i> &nbsp; View Certificate(s)</a>
        </li>
      </div>
      
      <?php 
        if($_SESSION['role'] == 'Admin'){
          echo '
          <h4><i class="fas fa-users"></i> &nbsp; Manage Staff</h4>
        <hr />
        <div class="divider">
        <li>
          <a href="add-user.php"><i class="fas fa-plus"></i> &nbsp; Add Staff</a>
        </li>
        <li>
          <a href="view-user.php"><i class="fas fa-list"></i> &nbsp; View Staff</a>
        </li>
        </div>
          ';
        }

      ?>
      <h4><i class="fas fa-qrcode"></i> &nbsp; Generate QR Code</h4>
      <hr />
      <div class="divider">
        <li id="generate">
          <a href="../qrcode/index.html" target="_blank"
          ><i class="fas fa-cogs"></i> &nbsp; Generate</a
          >
        </li>
      </div>
      <h4><i class="fas fa-user"></i> &nbsp; My Account</h4>
      <hr />
      <div class="divider">
        <li>
          <a href="setting.php"><i class="fas fa-cog"></i> &nbsp; Setting</a>
        </li>
        <li class="logout">
          <a
          href="logout.php"
          onclick="return confirm('Do you want to log out?')"
          >
          <i class="fas fa-sign-out-alt"></i> &nbsp; Logout</a
          >
        </li>
      </div>
    </aside>
    <div class="hamburger" id="hamburger">
      <div class="hamburger-item"></div>
      <div class="hamburger-item"></div>
      <div class="hamburger-item"></div>
      <div class="hamburger-item"></div>
    </div>
    <main id="main">
      <header> <h1>ADAMAWA STATE POLYTECHNIC, YOLA</h1> </header>
      <div class="panel">
        <div class="panel-header">
          <p class="panel-title"><?php echo $page; ?></p>
        </div>
        <div class="panel-body">