<?php
include("conn.php");
session_start();
$userid = $_SESSION['id'];
if(isset($_POST['store_name'])){
    $store_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['store_name'], ENT_QUOTES, 'UTF-8'));
    $pixel_code = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pixel_code'], ENT_QUOTES, 'UTF-8'));
    $delivery_fee = mysqli_real_escape_string($conn, htmlspecialchars($_POST['delivery_fee'], ENT_QUOTES, 'UTF-8'));
    $store_description = mysqli_real_escape_string($conn, htmlspecialchars($_POST['store_description'], ENT_QUOTES, 'UTF-8'));
    $tel = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8'));
    $about = mysqli_real_escape_string($conn, htmlspecialchars($_POST['about'], ENT_QUOTES, 'UTF-8'));
    $color = mysqli_real_escape_string($conn, htmlspecialchars($_POST['color'], ENT_QUOTES, 'UTF-8'));
    $keyword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['keyword'], ENT_QUOTES, 'UTF-8'));
    $update_user_sql = "UPDATE store_setting SET store_color='$color',keyword='$keyword',tel='$tel',about='$about',store_name='$store_name',pixel_code='$pixel_code',delivery_fee='$delivery_fee',store_description='$store_description' WHERE userid='$userid'";
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