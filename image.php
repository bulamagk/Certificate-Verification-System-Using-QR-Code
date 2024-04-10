<?php
require_once "connection.php";
header("content-type: image/png");
$image = $_SESSION['image'];
echo file_get_contents($image);
?>