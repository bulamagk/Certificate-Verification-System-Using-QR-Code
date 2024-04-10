<?php
$page = "ADD CERTIFICATE";
require_once "header.php";
 ?>
<div class="form-div">

  <?php 
  if(isset($_SESSION['message'])){
    echo '
    <div class="'.$_SESSION['class'].'">'.$_SESSION['message'].'</div>
    ';
    unset($_SESSION['message']);
  }
  ?>
  
  <form action="process-add-certificate.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="Student Matriculation Number">Matriculation Number</label>
      <input type="text" name="matricno" id="matricno" required />
    </div>
    <div class="form-group">
      <label for="Certificate">Upload Certificate</label>
      <input type="file" name="file" id="certificate" required />
    </div>
    <div class="form-group">
      <button name="add-certificate" type="submit" class="add-btn"> Add</button>
    </div>
  </form>
</div>

<?php require_once "footer.php"; ?>