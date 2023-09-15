<?php
include("conn.php");
session_start();
$userid = $_SESSION['id'];
if(isset($_POST['link'])){
    $link = mysqli_real_escape_string($conn, htmlspecialchars($_POST['link'], ENT_QUOTES, 'UTF-8'));
    $update_user_sql = "INSERT INTO categories(userid,category)VALUES('$userid','$link')";
    $update_user_result = mysqli_query($conn, $update_user_sql);
    if($update_user_result){
        //header("Location: update");
        echo "$link added sucessfully";
    }
    else{
        echo 'error'.mysqli_error($conn);
    }
}
if(isset($_POST['old_name'])){
    $old_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['old_name'], ENT_QUOTES, 'UTF-8'));
    $new_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['new_name'], ENT_QUOTES, 'UTF-8'));
    $update_user_sql = "UPDATE categories SET category='$new_name' WHERE userid='$userid' AND category='$old_name'";
    $update_user_result = mysqli_query($conn, $update_user_sql);
    if($update_user_result){
        //header("Location: update");
        $update_product_sql = "UPDATE products SET category='$new_name' WHERE userid='$userid' AND category='$old_name'";
        $update_product_result = mysqli_query($conn, $update_product_sql);
        echo "$old_name has been updated sucessfully to $new_name";
    }
    else{
        echo 'error'.mysqli_error($conn);
    }
}
?>