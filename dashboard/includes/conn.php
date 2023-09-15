<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'venormall';
$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
if(!$conn){
    echo 'Error: '.mysqli_connect_error();
}
?>