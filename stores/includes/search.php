<?php
include("conn.php");
session_start();
// The user's id from the store name
$userid = $_SESSION['userid'];

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $names = strtolower($row['product_name']);
    $existnames = array($names);
    if (isset($_POST['sugess'])){
        $name = $_POST['sugess'];
        if (!empty($name)){
            foreach($existnames as $existname){
                $sqlcode = "SELECT * FROM products WHERE product_name='$existname' AND userid='$userid'";
                $resultcode = mysqli_query($conn, $sqlcode);
                $rowcode = mysqli_fetch_assoc($resultcode);
                $code = $rowcode['product_code'];
                if (strpos($existname, $name) !== false){
                    echo "
                    <li><a class='mobile-cats-lead' style='color: #000;text-align: center;' href='item-$code'>$existname</a></li>
                    ";
                }
            }
        }
    }
}
?>
