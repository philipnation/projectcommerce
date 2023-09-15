<?php
include("conn.php");
session_start();
$userid = $_SESSION['id'];
if(isset($_POST['name'])){
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'));
    $business_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['business_name'], ENT_QUOTES, 'UTF-8'));
    $mobile = mysqli_real_escape_string($conn, htmlspecialchars($_POST['mobile'], ENT_QUOTES, 'UTF-8'));
    $update_user_sql = "UPDATE users SET name='$name', email='$email',business_name='$business_name',phone_number='$mobile' WHERE userid='$userid'";
    $update_user_result = mysqli_query($conn, $update_user_sql);
    if($update_user_result){
        //header("Location: update");
        echo 'update successful';
    }
    else{
        echo 'error'.mysqli_error($conn);
    }
}
?>