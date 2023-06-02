<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="product">
    <nav class="order-nav">
        <div class="page-name-nav">
            <div class="page-title">
                Products
            </div>
            <div class="exp-btn">
                <button>Export Orders</button>
                <button>Import Orders</button>
                <button class="add-product-btn"><a href='add.php'>Add Product</a></button>
            </div>
        </div>
        <div class="page-btns">
            <div class="filter">
                <i class="fa fa-filter"></i>
                <i class="fa fa-times" ></i>
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


    
</body>

</html>