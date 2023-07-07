<?php
include("conn.php");
session_start();
$userid = $_SESSION['userid'];
$category = $_POST['name'];
if($category == "all"){
    $sql = "SELECT * FROM products WHERE userid='$userid' ORDER BY RAND() LIMIT 40";
}
else{
    $sql = "SELECT * FROM products WHERE category = '$category' AND userid='$userid' ORDER BY RAND()";
}

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo "
        <div class='col-6 col-md-4 col-lg-3 col-xl-5col'>
            <div class='product product-11 text-center'>
                <figure><!-- class='product-media'-->
                    <a href='item-$row[product_code]'>
                        <img src='assets/images/product_image/$row[product_image]' alt='Product image' class='product-image' style='margin:auto;display: block;width: 60%;'>
                    </a>
                </figure>

                <div class='product-body'>
                    <!--<div class='product-cat'>
                        <a href='item-$row[product_code]'>Decor</a>
                    </div>-->
                    <h3 class='product-title'><a href='item-$row[product_code]'>$row[product_name]</a></h3><!-- End .product-title -->
                    <div class='product-price'>
                        $row[product_price]
                    </div>
                </div>
                <div class='product-action'>
                    <a href='item-$row[product_code]' class='btn-product btn-cart'><span>add to cart</span></a>
                </div>
            </div>
        </div>
        ";
    }
}
else{
    echo "<p>There is no product in this category</p>";
}