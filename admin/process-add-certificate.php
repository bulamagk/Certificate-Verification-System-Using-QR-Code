<?php
require_once "../connection.php";
if(isset($_POST['add-certificate'])){
    $matricno = $_POST['matricno'];
    $certificate = str_replace('/', '_', $matricno);
    $error = "";

    $sql = "SELECT matricno FROM certificate WHERE matricno = '$matricno'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $_SESSION['message'] = 'Certificate Already Exist!!!';
        $_SESSION['class'] = 'alert';
        header("location: add-certificate.php"); die();
    }

    if (isset($_FILES['file'])) {
          $file_name = $_FILES['file']['name'];
          $file_size = $_FILES['file']['size'];
          $file_tmp = $_FILES['file']['tmp_name'];
          $file_type = $_FILES['file']['type'];

          if($file_type = $_FILES['file']['type'] != 'image/png'){
            $error = "You can only upload PNG Image File ";
          }

          if ($file_size > 2097152) {
            $error = $error."<br>File size cannot be more than 2MB";
          }
          if ($error == "") {
            $file_name = "../certificates/$certificate.png";
            $certificate = "certificates/$certificate.png";

            move_uploaded_file($file_tmp, $file_name);

            $sql = "INSERT INTO certificate(matricno, certificate) VALUES('$matricno', '$certificate')";
            $result = $conn->query($sql);
            if ($result) {
                $_SESSION['message'] = "Certificate Added!!!";
                $_SESSION['class'] = 'alert-success';
                header("location: add-certificate.php");
            }
          }else{
                $_SESSION['message'] = $error;
                $_SESSION['class'] = 'alert';
                header("location: add-certificate.php");
          }
        }
}
?>