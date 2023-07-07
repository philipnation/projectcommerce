<?php
include("conn.php");
session_start();
function resetpassword($password, $password_repeat){
    global $conn;
    $password = sha1(mysqli_real_escape_string($conn, htmlspecialchars($password, ENT_QUOTES, 'UTF-8')));
    $password_repeat = sha1(mysqli_real_escape_string($conn, htmlspecialchars($password_repeat, ENT_QUOTES, 'UTF-8')));
    if(empty($password)||empty($password_repeat)){
        echo "Fill in the details.";
    }
    else{
        if($password != $password_repeat){
            echo "password does not match.";
        }
        else{
            $sql = "UPDATE users SET password = '$password' WHERE email = '$_SESSION[email]'";
            $result = mysqli_query($conn,$sql);
            if($result){
                // Send password successfully reset.
                echo "password has been successfully updated";
            }
            else{
                echo "error";
            }
        }
    }
}
resetpassword($_POST['password'],$_POST['password_repeat']);