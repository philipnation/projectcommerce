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
            <div class="filter">
                <i class="fa fa-filter"></i>
            </div>
            <div class="search-cont">
                <div class="number-cont">
                    <button>show</button>
                    <input type="number">
                </div>
                <div class="search-product">
                    <input type="text">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>
    <div class="body-order-page">
        <div class="order-cont">
            <div class="order-table-cont">
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>PRODUCT</th>
                            <th>ORDER ID</th>
                            <th>BUYER</th>
                            <th>AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>me</td>
                            <td>me</td>
                            <td>me</td>
                            <td>me</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>