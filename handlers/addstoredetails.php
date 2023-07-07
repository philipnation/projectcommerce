<?php
error_reporting(E_ALL);
session_start();
ini_set('display_errors', 1);

$error = ini_get('error_reporting');
include("conn.php");

function checkstorename($storename) {
    global $conn;
    $sql = "SELECT * FROM store_setting WHERE store_name='$storename'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "store name exist";
        return false;
    }

    // Email is valid and does not exist
    return true;
}

function addstoredetails($storenameparam,$storeaboutparam,$storedescriptionparam){
    global $conn;
    $storename = mysqli_real_escape_string($conn, $storenameparam);
    $storeabout = mysqli_real_escape_string($conn, $storeaboutparam);
    $storedescription= mysqli_real_escape_string($conn, $storedescriptionparam);
    $sql = "INSERT INTO store_setting(
        userid,store_name,store_description,about
        )
        VALUES(
            '$_SESSION[id]','$storename','$storeabout','$storedescription'
        )
        ";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo 'passed';
    }
    else{
        echo 'error';
    }
}

if (checkstorename($_POST['storename']) ) {
    addstoredetails(
        $_POST['storename'], 
        $_POST['storeabout'], 
        $_POST['storedescription']
    );
}