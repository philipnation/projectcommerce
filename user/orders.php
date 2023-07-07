<?php
include('header.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <nav class="order-nav">
        <div class="page-name-nav">
            <div class="page-title">
                Orders
            </div>
            <div class="exp-btn">
                <button>Export orders</button>
            </div>
        </div>
        <div class="page-btns">
            <div class="search-cont">
                <div class="search-product">
                    <input type="text" id="search_order" placeholder="search orderid">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>
    <script>
        $(document).ready(function(){

        $("#search_order").keyup(function(){
            var name = $("#search_order").val();
            $.post("includes/search_order.php", {
                sugess: name
            }, function(data, status){
                $("#order_tr").html(data);
                //alert(data)
            });
        });
        });
    </script>
    <div class="body-order-page">
        <div class="order-cont">
            <div class="order-table-cont">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead class="thead-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody id='order_tr'>
                            <?php
                            $order_sql = "SELECT * FROM orders WHERE userid='$userid' AND action='pending' ORDER BY id DESC";
                            $order_result = mysqli_query($conn, $order_sql);
                            while($order_row = mysqli_fetch_assoc($order_result)){
                                $product_image = explode (",", $order_row['product_image']);
                                $order_total = number_format($order_row['order_total']);
                                echo "
                                <tr>
                                <td>
                                    <h5>$order_row[ordername]</h5>
                                </td>
                                <td>
                                ";
                                    foreach($product_image as $image){
                                        echo "
                                            <img src='../stores/assets/images/product_image/$image' alt='pro' style='display:none;'>
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
                                    <h5>$currency$order_total</h5>
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
                            ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>