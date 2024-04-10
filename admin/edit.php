<?php
require_once '../connection.php';

if(isset($_POST['edit-certificate'])){
    $matricno = $_POST['matricno'];
    $certificate = str_replace('/', '_', $matricno);
    $error = "";
    $id = $_SESSION['id'];
    
    if (isset($_FILES['file'])) {
      if($_FILES['file']['size'] !== 0){
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
          
          $sql = "UPDATE certificate SET matricno = '$matricno', certificate = '$certificate' WHERE id = $id";
          $result = $conn->query($sql);
          if ($result) {
            $_SESSION['message'] = "Certificate Updated!!!";
            $_SESSION['class'] = 'alert-success';
            unset($_SESSION['id']);
            unset($_SESSION['matricno']);
            header("location: view-certificate.php");
          }
        }else{
          $_SESSION['message'] = $error;
          $_SESSION['class'] = 'alert';
          header("location: edit-certificate.php");
        }
      }else{
        $sql = "UPDATE certificate SET matricno = '$matricno' WHERE id = $id";
            $result = $conn->query($sql);
            if ($result) {
                $_SESSION['message'] = "Certificate Updated!!!";
                $_SESSION['class'] = 'alert-success';
                unset($_SESSION['id']);
                unset($_SESSION['matricno']);
                header("location: view-certificate.php");
            }
      }
    }

}elseif(isset($_POST['edit-staff'])){
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $othername = $_POST['othername'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeat-password'];

    $id = $_SESSION['id'];

    $error = '';
    
    $sql = "SELECT id, email FROM user WHERE email ='$email' AND id != $id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $_SESSION['message'] = '<p> An Account Email Already Exist </p>';
        $_SESSION['class'] = 'alert';
        $_SESSION['firstname'] = $firstname;
        $_SESSION['surname'] = $surname;
        $_SESSION['othername'] = $othername;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['password'] = $password;
        $_SESSION['repeatpassword'] = $repeatpassword;
        header('location: edit-user.php'); die();
    }
    
    if($password !== $repeatpassword){
        $_SESSION['message'] = 'Passwords Does Not Match!!!';
        $_SESSION['class'] = 'alert';
        $_SESSION['firstname'] = $firstname;
        $_SESSION['surname'] = $surname;
        $_SESSION['othername'] = $othername;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['password'] = $password;
        $_SESSION['repeatpassword'] = $repeatpassword;
        header('location: edit-user.php'); die();
    }

    $sql = "UPDATE user SET firstname = '$firstname', surname = '$surname', othername = '$othername',
     email = '$email', phone = '$phone', password = '$password' WHERE id = $id";
     if($conn->query($sql)){
        unset($_SESSION['firstname']);
        unset($_SESSION['surname']);
        unset($_SESSION['othername']);
        unset($_SESSION['email']);
        unset($_SESSION['phone']);
        unset($_SESSION['password']);
        unset($_SESSION['repeatpassword']);
        $_SESSION['message'] = '<p> Staff Updated Successfully!!! </p>';
        $_SESSION['class'] = 'alert-success';
        header('location: view-user.php');
     }
}else{
    header('location: dashboard.php');
}
?>