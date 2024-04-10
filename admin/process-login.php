<?php
require_once "../connection.php";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, firstname, email, password, active, role FROM user WHERE email = '$email' AND password = '$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $firstname = $row['firstname'];
            $role = $row['role'];
            $active = $row['active'];
        }
        
        if($active === 'Yes'){
            $_SESSION['role'] = $role;
            $_SESSION['active'] = $active;
            $_SESSION['login'] = true;
            $_SESSION['loginid'] = $id;
            $_SESSION['loginname'] = $firstname;
            $_SESSION['loginuser'] = $email;
            header('location: dashboard.php');
        }else{
            $_SESSION['message'] = 'Your Account is Not Activated, Contact the Admin!!!';
            header("location: index.php");
        }

    }else{
        $_SESSION['message'] = 'Wrong Email and/or Password!!!';
        header("location: index.php");
    }   
}
?>