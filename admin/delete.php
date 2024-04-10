<?php
require_once '../connection.php';

// Delete Certificate
if(isset($_GET['cid'])){
    $cid = $_GET['cid'];
    
    $sql = "SELECT * FROM certificate WHERE id = '$cid'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $certificate = "../".$row['certificate'];
    }

    $sql = "DELETE FROM certificate WHERE id = '$cid'";
    if($conn->query($sql)){
        if(file_exists($certificate)){
            unlink($certificate);
        }
        $_SESSION['message'] = "Certificate Deleted Successfully!!!";
        $_SESSION['class'] = 'alert-success';
        header("location: view-certificate.php");
    }
}

// Delete User
if(isset($_GET['uid'])){
    $uid = $_GET['uid'];
    $sql = "DELETE FROM user WHERE id = '$uid'";
    if($conn->query($sql)){
        $_SESSION['message'] = "User Deleted Successfully!!!";
        $_SESSION['class'] = 'alert-success';
        header("location: view-user.php");
    }
}
?>