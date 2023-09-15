<?php
include("conn.php");
function validatelogin($email, $password){
    global $conn;
    $email = mysqli_real_escape_string($conn, htmlspecialchars($email, ENT_QUOTES, 'UTF-8'));
    $pass= mysqli_real_escape_string($conn, htmlspecialchars($password, ENT_QUOTES, 'UTF-8'));
    $password = sha1($pass);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id'] = $row['userid'];
        if($row['active'] == 0){
            $_SESSION['otp'] = '123123';
            echo "verify";
            //send otp as mail;
        }
        else{
            echo "dashboard";
        }
    }
    else{
        echo "incorrect details";
    }
}
validatelogin($_POST['email'], $_POST['password']);