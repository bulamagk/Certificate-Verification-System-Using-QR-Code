<?php
// Database Connection Parameters
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'cvs';

// Establishing Connection
$conn = new mysqli($host, $user, $password, $db);

// Checking Connection Error
if($conn->connect_error){
    echo "ERROR IN CONNECTION".$conn->connect_error;
    die();
}

// Session
session_start();
?>