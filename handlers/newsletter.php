<?php
include("conn.php");
function addemail($email){
    global $conn;
    if(empty($email)){
        echo "empty";
    }
    else{
        $sql = "SELECT * FROM newsletter WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "Email has already been added before. Add another one.";
        }
        else{
            $sql = "INSERT INTO newsletter(email)VALUES('$email')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "Thanks for subscribing to our newsletter";
            }
            else{
                echo "error";
            }
        }
    }
}

addemail($_POST['newsemail']);