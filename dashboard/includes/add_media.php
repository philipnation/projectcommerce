<?php
include("conn.php");
session_start();
$userid = $_SESSION['id'];
if(isset($_POST['name'])){
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'));
    $link = mysqli_real_escape_string($conn, htmlspecialchars($_POST['link'], ENT_QUOTES, 'UTF-8'));
    $update_user_sql = "INSERT INTO social_media(userid,name,link)VALUES('$userid', '$name', '$link')";
    $update_user_result = mysqli_query($conn, $update_user_sql);
    if($update_user_result){
        //header("Location: update");
        echo "$name added sucessfully";
    }
    else{
        echo 'error'.mysqli_error($conn);
    }
}
if(isset($_POST['update_name'])){
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['update_name'], ENT_QUOTES, 'UTF-8'));
    $link = mysqli_real_escape_string($conn, htmlspecialchars($_POST['link'], ENT_QUOTES, 'UTF-8'));
    $update_user_sql = "UPDATE social_media SET link='$link' WHERE userid='$userid' AND name='$name'";
    $update_user_result = mysqli_query($conn, $update_user_sql);
    if($update_user_result){
        //header("Location: update");
        echo "$name updated sucessfully";
    }
    else{
        echo 'error'.mysqli_error($conn);
    }
}
?>