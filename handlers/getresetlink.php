<?php
include("conn.php");
function resetcode() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    $length = 50;

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
function resetlink($email){
    global $conn;
    $email = mysqli_real_escape_string($conn, htmlspecialchars($email, ENT_QUOTES, 'UTF-8'));
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    if(empty($email)){
        echo "Fill in the details.";
    }
    else{
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            // Send reset link.
            session_start();
            $_SESSION['reset'] = resetcode();
            $_SESSION['email'] = $email;
            echo "A reset link has been sent to your email. Check your inbox.";
            echo "localhost/venormall/reset?reset=$_SESSION[reset]";
        }
        else{
            echo "email does not exist";
        }
    }
}
resetlink($_POST['email']);