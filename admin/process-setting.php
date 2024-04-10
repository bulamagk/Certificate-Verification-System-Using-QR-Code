<?php
require_once '../connection.php';

if(isset($_POST['edit-account'])){
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $othername = $_POST['othername'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeat-password'];

    $id = $_SESSION['loginid'];

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
        header('location: setting.php'); die();
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
        header('location: setting.php'); die();
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
        $_SESSION['loginuser'] = $email;
        $_SESSION['message'] = '<p> Acccount Updated Successfully!!! </p>';
        $_SESSION['class'] = 'alert-success';
        header('location: setting.php');
     }
}else{
    header('location: dashboard.php');
}
?>