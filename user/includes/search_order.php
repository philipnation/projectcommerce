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
                            <p>$order_row[firstname] $order_row[lastname]</p>
                            <p>$order_row[email]</p>
                        </td>
                        <td>
                            <p>$order_row[product_price]</p>
                        </td>
                        <td>
                            <p>$order_row[product_quantity]</p>
                        </td>
                        <td>
                            <p>$order_row[street_address]</p>
                        </td>
                        <td>
                            <p>$order_row[date]</p>
                        </td>
                        <td>
                            <p>NGN $order_row[order_total]</p>
                        </td>
                        <td>
                            <div class='order-btns'>
                                <a href='vieworder-$order_row[ordername]'><button class='view-order'>View</button></a>
                                <!--<button class='cancel-order'>Cancel</button>-->
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
