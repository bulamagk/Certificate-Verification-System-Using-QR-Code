<?php
$page = "EDIT CERTIFICATE";
require_once "header.php";
 ?>
<div class="form-div">

  <?php 
  if(isset($_SESSION['message'])){
    echo '
    <div class="'.$_SESSION['class'].'">'.$_SESSION['message'].'</div>
    ';
  }
  
  if(isset($_GET['cid']) || isset($_SESSION['message'])){
    unset($_SESSION['message']);
    
    if(isset($_GET['cid'])){
      $cid = $_GET['cid'];
      $_SESSION['id'] = $cid;
      $sql = "SELECT * FROM certificate WHERE id = '$cid'";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){
       $_SESSION['matricno']= $row['matricno'];
      }

}

}else{
    header('location: add-certificate.php');
}
  ?>
  <!-- <div class="alert-success">Certificat Added Successfully!!!</div> -->
  <form action="edit.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="Student Matriculation Number">Matriculation Number</label>
      <input type="text" name="matricno" id="matricno" required value="<?php echo $_SESSION['matricno']; ?>" />
    </div>
    <div class="form-group">
      <label for="Certificate">Upload Certificate</label>
      <input type="file" name="file" id="certificate" />
    </div>
    <div class="form-group">
      <button name="edit-certificate" type="submit" class="add-btn"> Update</button>
    </div>
  </form>
</div>

<?php require_once "footer.php"; ?>