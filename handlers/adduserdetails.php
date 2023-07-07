<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = ini_get('error_reporting');
session_start();
include("conn.php");

function generateRandomString() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    $length = 10;

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
function userid() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    $length = 10;

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

function checkemail($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists";
        return false;
    }

    // Email is valid and does not exist
    return true;
}

function checkphonenumber($phone) {
    global $conn;
    $sql = "SELECT * FROM users WHERE phone_number='$phone'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Phone number already exists";
        return false;
    }

    // Phone number is valid and does not exist
    return true;
}
function checkrefcode($refcode) {
    global $conn;
    $sql = "SELECT * FROM users WHERE ref_code='$refcode'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0 || $refcode =='') {
        return true;
    }

    // referral is invalid or does not exist
    echo "Invalid referral code";
    return false;
}

function checkRegistrationLimit() {
    $maxAttempts = 10; // Maximum number of registration attempts allowed
    $ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

    // Check if the session variable for the registration attempts exists
    if (!isset($_SESSION['registration_attempts'][$ip])) {
        $_SESSION['registration_attempts'][$ip] = 1; // Initialize the attempts count for the IP
        return true; // Allow the registration request
    }

    // If the number of attempts exceeds the limit, return false
    if ($_SESSION['registration_attempts'][$ip] >= $maxAttempts) {
        echo "Too many registration trials. Please try again later.";
        return false;
    }

    $_SESSION['registration_attempts'][$ip]++; // Increment the attempts count
    return true; // Allow the registration request
}

function adduserdetails($nameparam,$business_nameparam,$emailparam,$pass,$phone_numberparam,$plan,$refcode){
    global $conn;
    global $error;
    $password = mysqli_real_escape_string($conn, sha1($pass));
    $name = mysqli_real_escape_string($conn, htmlspecialchars($nameparam, ENT_QUOTES, 'UTF-8'));
    $business_name = mysqli_real_escape_string($conn, htmlspecialchars($business_nameparam, ENT_QUOTES, 'UTF-8'));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($emailparam, ENT_QUOTES, 'UTF-8'));
    $phone_number = mysqli_real_escape_string($conn, htmlspecialchars($phone_numberparam, ENT_QUOTES, 'UTF-8'));
    $reg_date = date('jS F, Y');
    $ref_code = generateRandomString();
    $userid = userid();
    $sql = "INSERT INTO users(
        name,ref_code,email,password,phone_number,business_name,userid,reg_date,venorcredit,status,action,template,plan,active
        )
        VALUES(
            '$name','$ref_code','$email','$password','$phone_number','$business_name','$userid','$reg_date','0','unpaid','active','1','$plan','0'
        )
        ";
    $result = mysqli_query($conn, $sql);
    if($result){
        //session_start();
        $_SESSION['id'] = $userid;
        if($refcode != ""){
            $sql = "INSERT INTO referral(
                userid,ref_code,action
            )
            VALUES('$userid','$refcode','unpaid')
            ";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo 'passed';
            }
        }
        else{
            echo 'passed';
        }
    }
    else{
        echo 'error';
    }
}
//check if email and phone number exist
if (checkemail($_POST['email']) && checkphonenumber($_POST['phone_number']) && checkRegistrationLimit() && checkrefcode($_POST['refcode'])) {
    adduserdetails(
        $_POST['name'], 
        $_POST['business_name'], 
        $_POST['email'], 
        $_POST['password'], 
        $_POST['phone_number'],
        $_POST['plan'],
        $_POST['refcode']
    );
}