<?php
require_once '../connection.php';

if(isset($_POST['add-user'])){
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $othername = $_POST['othername'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeat-password'];

    $error = '';
    
    $sql = "SELECT email FROM user WHERE email ='$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $_SESSION['firstname'] = $firstname;
        $_SESSION['surname'] = $surname;
        $_SESSION['othername'] = $othername;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['password'] = $password;
        $_SESSION['repeatpassword'] = $repeatpassword;
        $error = "<p>User with that Email Already Exist!!!</p>";
    }
    
    if($password !== $repeatpassword){
        $_SESSION['firstname'] = $firstname;
        $_SESSION['surname'] = $surname;
        $_SESSION['othername'] = $othername;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['password'] = $password;
        $_SESSION['repeatpassword'] = $repeatpassword;
        $error = $error."<p> Passwords Does not Match!!!</p>";
    }
    
    if($error === ''){
        $sql = "INSERT INTO user(firstname, surname, othername, email, phone, password, active, role)
        VALUES('$firstname', '$surname', '$othername', '$email', '$phone', '$password', 'Yes', 'Staff')";
        $result = $conn->query($sql);
        if($result){
            $_SESSION['message'] = 'Staff Added Successfully!!!';
            $_SESSION['class'] = 'alert-success';
            header("location: add-user.php");
        }
    }else{
        $_SESSION['message'] = $error;
        $_SESSION['class'] = 'alert';
        header("location: add-user.php");
    }


}else{
    header('location: dashboard.php');
}
?>