<?php
include("header.php");
if(isset($_GET['deliver'])){
    $oid = $_GET['deliver'];
    $deliver_sql = "UPDATE orders SET action='delivered' WHERE ordername='$oid'";
    $deliver_result = mysqli_query($conn, $deliver_sql);
    if($deliver_result){
        header("Location: ./orders");
    }
    else{
        echo "error";
    }
}
if(isset($_GET['decline'])){
    $oid = $_GET['decline'];
    $deliver_sql = "UPDATE orders SET action='declined' WHERE ordername='$oid'";
    $deliver_result = mysqli_query($conn, $deliver_sql);
    if($deliver_result){
        header("Location: ./orders");
    }
    else{
        echo "error";
    }
}
if(!isset($_GET['ordername'])){
    header("Location: ./orders");
}
else{
    $ordername = $_GET['ordername'];
    $single_order_sql = "SELECT * FROM orders WHERE ordername = '$ordername'";
    $single_order_result = mysqli_query($conn, $single_order_sql);
    if(mysqli_num_rows($single_order_result) > 0 ){
        $single_order_row = mysqli_fetch_assoc($single_order_result);
        $product_name = explode (",", $single_order_row['product_name']);
        $product_price = explode (",", $single_order_row['product_price']);
        $product_quantity = explode (",", $single_order_row['product_quantity']);
        $product_image = explode (",", $single_order_row['product_image']);
        $product_quantity_total = explode (",", $single_order_row['product_quantity_total']);
        $status = $single_order_row['action'];
        $product_id = $single_order_row['product_code'];
    }
    else{
        header("Location: ../");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<body style='  background-color: #ECE9E9;'>
    <div class="view-body">
        <div class="view-details-container">
            <div class="order-table">
                <div class="table-responsive">
                    <table class="table custom-table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>product</th>
                                <th>quantity</th>
                                <th>amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($product_name as $index =>$name){
                                    $image = $product_image[$index];
                                    $price = $product_price[$index];
                                    $quantity = $product_quantity[$index];
                                    $quantity_total = $product_quantity_total[$index];
                                    echo "
                                            <tr>
                                        <td>
                                            <div class='td-content'>
                                                <img src='../stores/assets/images/product_image/$image' alt='p-img'>
                                                <h4>
                                                    <p style='text-transform: capitalize;'>$name</p>
                                                    <p>ngn$price</p>
                                                </h4>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='td-content'>
                                                <h4>
                                                    <p style='margin-bottom: 8px;'>$quantity</p>
                                                    <!--<p style='text-transform: capitalize;'>Available stock: 50</p>-->
                                                </h4>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='td-content' style='text-transform: uppercase;'>
                                                ngn $quantity_total
                                            </div>
                                        </td>
                                    </tr>
                                        ";
                                }
                            ?>
                            <tr>
                                <td>Date - <?php echo $single_order_row['date'] ?></td>
                                <td></td>
                                <td style="text-transform: uppercase;">Total - ngn <?php echo $single_order_row['order_total'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="view-ord-details">
                <div class="view-headers">
                    <a href="#" id="shippingBtn" onclick="shipping()">
                        <header>delivery</header>
                    </a>
                    <a href="#" id="paymentBtn"  onclick="payment()">
                        <header>send mail/sms</header>
                    </a>
                </div>




                <div class="header-content-container">
                    <div class="shipping-details">
                        <div class="shipping-table" id="shipping-cont">
                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>PAYMENT METHOD</th>
                                            <th>STATUS</th>
                                            <th>DELIVERY NOTE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $single_order_row['payment_method'] ?></td>
                                            <td style="color: <?php if($status == 'pending'){echo 'yellow';}elseif($status == 'delivered'){echo 'green';}elseif($status == 'declined'){echo 'red';} ?>;"><?php echo $single_order_row['action'] ?></td>
                                            <td><?php echo $single_order_row['delivery_note'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            if($status == 'delivered' || $status=='declined'){

                            }
                            else{
                                echo "";?>
                                <button name="send_email" class="action-btn" style="background-color: red;"><a href="decline-<?php echo $ordername ?>">order declined</a></button><br>
                                <button name="send_sms" class="action-btn"><a href="deliver-<?php echo $ordername ?>">order delivered</a></button>
                                <?php echo "";
                            }
                            ?>
                            <!--<div class="info-table">
                                <header class="info-header">
                                    Shipping information
                                </header>
                                <div class="table-responsive">
                                    <table class="table custom-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>shipping name</th>
                                                <th>estimated delivery time</th>
                                                <th>shiiping rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>standard shipping</td>
                                                <td>3-5 working days</td>
                                                <td>NGN50.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>-->
                        </div>
                    </div>



                    <div class="payment-cont" id="payment-cont">
                        <div class="payment-box">
                            <div class="payment-headers">
                                <header class="site-name">reach out</header>
                            </div>
                            <div class="payment-form-box">
                                <!--<header>Payment Information</header>-->
                                <div class="details">
                                    <form>
                                        <div class="form-groups">
                                            <input type="text" placeholder='subject' name="subject">
                                        </div>
                                        <div class="form-groups">
                                            <textarea name="message" id="" cols="30" rows="10" placeholder="message"></textarea>
                                        </div>
                                        <div class="form-groups">
                                            <button class="pay-btn" name="send_email">send email</button>
                                            <button class="pay-btn" name="send_sms">send sms</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="view-buyer-details">
            <div class="cont">
                <header>CUSTOMER'S DETAILS</header>
                <div class="cont-details">
                    <p>Name: <?php echo $single_order_row['firstname']." ".$single_order_row['lastname'] ?></p>
                    <p>Phone number: <?php echo $single_order_row['phone_number'] ?></p>
                    <p>Email: <?php echo $single_order_row['email'] ?></p>
                </div>
            </div>
            <div class="cont" style="border-bottom: none;">
                <header>DELIVERY ADDRESS</header>
                <div class="cont-details">
                    <p class="buyer-country">Country: <?php echo $single_order_row['country'] ?></p>
                    <p class="buyer-state">State: <?php echo $single_order_row['state'] ?></p>
                    <p class="buyer-town">City: <?php echo $single_order_row['city'] ?></p>
                    <p class="buyer-address">Street: <?php echo $single_order_row['street_address'] ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>