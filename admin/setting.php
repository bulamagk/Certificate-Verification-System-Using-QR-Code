<?php
$page = "ACCOUNT SETTING";
require_once "header.php";
 ?>

<div class="form-div-user">

  <?php 
  if(isset($_SESSION['message'])){
    echo '
    <div class="'.$_SESSION['class'].'">'.$_SESSION['message'].'</div>
    ';
    unset($_SESSION['message']);
  }
    $email = $_SESSION['loginuser'];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
    $_SESSION['firstname'] = isset($_SESSION['firstname']) ? $_SESSION['firstname']: $row['firstname'];
    $_SESSION['surname'] = isset($_SESSION['surname']) ? $_SESSION['surname']: $row['surname'];
    $_SESSION['othername'] = isset($_SESSION['othername']) ? $_SESSION['othername']: $row['othername'];
    $_SESSION['email'] = isset($_SESSION['email']) ? $_SESSION['email']: $row['email'];
    $_SESSION['phone'] = isset($_SESSION['phone']) ? $_SESSION['phone']: $row['phone'];
    $_SESSION['password'] = isset($_SESSION['password']) ? $_SESSION['password']: $row['password'];
    $_SESSION['repeatpassword'] = isset($_SESSION['repeatpassword']) ? $_SESSION['repeatpassword']: '';
    }


  ?>
  
  <form action="process-setting.php" method="post" enctype="multipart/form-data">
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
      <button name="edit-account" type="submit" class="add-btn"> Update</button>
    </div>
  </form>
</div>


<?php require_once "footer.php"; ?>