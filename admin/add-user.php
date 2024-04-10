<?php
$page = "ADD STAFF";
require_once "header.php";

if($_SESSION['role'] != 'Admin'){
    header('location: dashboard.php');
}
 ?>

<div class="form-div-user">

  <?php 
  if(isset($_SESSION['message'])){
    echo '
    <div class="'.$_SESSION['class'].'">'.$_SESSION['message'].'</div>
    ';
    unset($_SESSION['message']);
  }
  ?>
  
  <form action="process-add-user.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="First Name">First Name</label>
      <input type="text" name="firstname" id="firstname" required value="<?php echo isset($_SESSION['firstname'])? $_SESSION['firstname']: ''; ?>" />
    </div>
    <div class="form-group">
      <label for="Surname">Surname</label>
      <input type="text" name="surname" id="surname" required value="<?php echo isset($_SESSION['surname'])? $_SESSION['surname']: ''; ?>"  />
    </div>
    <div class="form-group">
      <label for="Othername">Othername</label>
      <input type="text" name="othername" id="othername" value="<?php echo isset($_SESSION['othername'])? $_SESSION['othername']: ''; ?>"  />
    </div>
    <div class="form-group">
      <label for="Email">Email</label>
      <input type="email" name="email" id="email" style="background-color: #f8f1f1;" required value="<?php echo isset($_SESSION['email'])? $_SESSION['email']: ''; ?>"  />
    </div>
    <div class="form-group" style="width: 100%;">
      <label for="Phone Number">Phone Number</label>
      <input type="number" name="phone" id="phone" required value="<?php echo isset($_SESSION['phone'])? $_SESSION['phone']: ''; ?>"  />
    </div>
    <div class="form-group">
      <label for="Password">Password</label>
      <input type="Password" name="password" id="password" required value="<?php echo isset($_SESSION['password'])? $_SESSION['password']: ''; ?>"  />
    </div>
    <div class="form-group">
      <label for="Repeat Password">Repeat Password</label>
      <input type="Password" name="repeat-password" id="repeat-password" required value="<?php echo isset($_SESSION['repeatpassword'])? $_SESSION['repeatpassword']: ''; ?>"  />
    </div>
    <div class="form-group">
      <button name="add-user" type="submit" class="add-btn"> Add</button>
    </div>
  </form>
</div>

<?php
unset($_SESSION['firstname']);
unset($_SESSION['surname']);
unset($_SESSION['othername']);
unset($_SESSION['email']);
unset($_SESSION['phone']);
unset($_SESSION['password']);
unset($_SESSION['repeatpassword']);
?>

<?php require_once "footer.php"; ?>