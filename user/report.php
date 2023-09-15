<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="order-nav">
        <div class="page-name-nav">
            <div class="page-title">
                Reports - Sales
            </div>
            <div class="cancel-btn-cont">
                <button class="cancel-btn"><a href="home">&times;</a></button>
            </div>
        </div>
    </nav>
    <div class="report-cont">
        <div class="report-info">
            <div class="report-headers">
                <!--<div class="report-headers-info">
                    <h4>Yesterday</h4>
                    <p>0 Orders</p>
                    <h3 class="total-amount-day">NGN0.00</h3>
                </div>-->
                <?php
                function get_report($var){
                    global $conn;
                    global $userid;
                    $today = date("d");
                    $month = date("m");
                    $year = date("Y");
                    if($var == "day"){
                        $report_sql = "SELECT order_date, order_total FROM orders WHERE userid='$userid' AND DAY(order_date) = $today AND MONTH(order_date) = $month AND YEAR(order_date) = $year AND action = 'delivered'";
                    }
                    elseif($var == "month"){
                        $report_sql = "SELECT order_date, order_total FROM orders WHERE userid='$userid' AND MONTH(order_date) = $month AND YEAR(order_date) = $year AND action = 'delivered'";
                    }
                    elseif($var == "year"){
                        $report_sql = "SELECT order_date, order_total FROM orders WHERE userid='$userid' AND YEAR(order_date) = $year AND action = 'delivered'";
                    }
                    $report_result = mysqli_query($conn, $report_sql);
                    echo mysqli_num_rows($report_result);
                }
                function get_report_total($var){
                    global $conn;
                    global $userid;
                    $today = date("d");
                    $month = date("m");
                    $year = date("Y");
                    $count = 0;
                    if($var == "day"){
                        $report_sql = "SELECT order_date, order_total FROM orders WHERE userid='$userid' AND DAY(order_date) = $today AND MONTH(order_date) = $month AND YEAR(order_date) = $year AND action = 'delivered'";
                    }
                    elseif($var == "month"){
                        $report_sql = "SELECT order_date, order_total FROM orders WHERE userid='$userid' AND MONTH(order_date) = $month AND YEAR(order_date) = $year  AND action = 'delivered'";
                    }
                    elseif($var == "year"){
                        $report_sql = "SELECT order_date, order_total FROM orders WHERE userid='$userid' AND YEAR(order_date) = $year AND action = 'delivered'";
                    }
                    $report_result = mysqli_query($conn, $report_sql);
                    while($report_row = mysqli_fetch_assoc($report_result)){
                        $count += $report_row['order_total'];
                        //echo $report_row['order_total']."<br>";
                    }
                    echo number_format($count);
                }
                ?>
                <div class="report-headers-info">
                    <h4>Today</h4>
                    <p><?php get_report('day') ?> Orders</p>
                    <h3 class="total-amount-day">NGN <?php get_report_total('day') ?></h3>
                </div>
                <div class="report-headers-info">
                    <h4>This Month</h4>
                    <p><?php get_report('month') ?> Orders</p>
                    <h3 class="total-amount-day">NGN <?php get_report_total('month') ?></h3>
                </div>
                <div class="report-headers-info">
                    <h4>This Year</h4>
                    <p><?php get_report('year') ?> Orders</p>
                    <h3 class="total-amount-day">NGN <?php get_report_total('year') ?></h3>
                </div>
            </div>
            <div class="report-info-cont">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead class="thead-light">
                            <tr>
                                <th>DATE DELIVERY</th>
                                <th>DELIVERY FEE</th>
                                <th>CUSTOMER PAID</th>
                                <th>SELLING PRICE</th>
                                <th>GAIN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $report_result = mysqli_query($conn, "SELECT * FROM order_report WHERE userid='$userid'");
                            if(mysqli_num_rows($report_result) > 0){
                                while($report_row = mysqli_fetch_assoc($report_result)){
                                    $gain = number_format($report_row['price_sold'] - $report_row['price_gained']);
                                    $price_sold = number_format($report_row['price_sold']);
                                    $price_gained = number_format($report_row['price_gained']);
                                    echo "
                                        <tr>
                                            <td>$report_row[date_delivered]</td>
                                            <td>NGN $report_row[delivery_fee]</td>
                                            <td>NGN $price_sold</td>
                                            <td>NGN $price_gained</td>
                                            <td>NGN $gain</td>
                                        </tr>
                                        ";
                                }
                            }
                            else{
                                echo "
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>no report available</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>