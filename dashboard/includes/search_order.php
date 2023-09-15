<?php
include("conn.php");
session_start();

$sql = "SELECT * FROM orders WHERE userid = '$_SESSION[id]'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $names = strtolower($row['ordername']);
    $existnames = array($names);
    if (isset($_POST['sugess'])){
        $name = strtolower($_POST['sugess']);
        if (!empty($name)){
            foreach($existnames as $existname){
                if (strpos($existname, $name) !== false){
                    $order_sql = "SELECT * FROM orders WHERE userid='$_SESSION[id]' AND action='pending' AND ordername LIKE '%$existname%'";
                    $order_result = mysqli_query($conn, $order_sql);
                    if(mysqli_num_rows($order_result) > 0){
                    while($order_row = mysqli_fetch_assoc($order_result)){
                        $product_image = explode (",", $order_row['product_image']);
                        echo "
                        <tr>
                        <td>
                            <h5>$order_row[ordername]</h5>
                        </td>
                        <td>
                        ";
                            foreach($product_image as $image){
                                echo "
                                    <img src='../stores/assets/images/product_image/$image' alt='pro' style='display:none'>
                                    ";
                            }
                                echo "
                            <p>$order_row[product_name]</p>
                        </td>
                        <td>
                            $order_row[firstname] $order_row[lastname]<br>
                            $order_row[email]
                        </td>
                        <td>
                            $order_row[product_price]
                        </td>
                        <td>
                            $order_row[product_quantity]
                        </td>
                        <td>
                            $order_row[street_address]
                        </td>
                        <td>
                            $order_row[date]
                        </td>
                        <td>
                            NGN $order_row[order_total]
                        </td>
                        <td>
                            <div class='d-flex justify-content-between align-items-end flex-wrap'>
                                <button type='button' class='btn btn-icon me-3 d-md-block '>
                                <!--bg-white-->
                                <a href='vieworder-$order_row[ordername]'><i class='mdi mdi-eye text-muted'></i></a>
                                </button>
                            </div>
                        </td>
                    </tr>
                        ";
                    }
                }
                else{
                    echo "no record found";
                }
                }
            }
        }
    }
}
?>
