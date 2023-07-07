<?php
include("conn.php");
session_start();
if(!isset($_SESSION['opt']));{
    header("Loaction: ./");
}
$userid = $_SESSION['id'];
$sql = "UPDATE users SET active = '1' WHERE userid='$userid'";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: user");
}
else{
    echo "error";
}