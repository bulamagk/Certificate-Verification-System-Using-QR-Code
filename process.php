<?php
require_once "connection.php";
if(isset($_GET['matricno'])){
    $matricno = $_GET['matricno'];

    $sql = "SELECT matricno, certificate FROM certificate WHERE matricno='$matricno'";

    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $_SESSION['image'] = $row['certificate'];
            header("location: image.php");
        }
    }else{
        $_SESSION['message'] = strtoupper($matricno);
        header("location: index.php");
    }
}else{
    header("location: index.php");
}
?>