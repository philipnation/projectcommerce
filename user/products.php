<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
</head>

<body class="product-body">
    <nav class="order-nav">
        <div class="page-name-nav">
            <div class="page-title">
                Products
            </div>
            <div class="add-btn" style="width:130px;height:43px;">
                <!--<button>Import Orders</button>-->
                <button class="add-product-btn"><a href='addproduct'>Add Product</a></button>
            </div>
        </div>
        <script>
            $(document).ready(function(){

            $("#search_product").keyup(function(){
                var name = $("#search_product").val();
                $.post("includes/search_product.php", {
                    sugess: name
                }, function(data, status){
                    $("#result").html(data);
                    //alert(data)
                });
            });
            });
        </script>
        <div class="page-btns">
            <div class="search-cont">
                <form class="search-product" onsubmit="event.preventDefault(); handleSearch();">
                    <input type="text" id="search_product" name="searchInput" placeholder="search product">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
    <link rel="stylesheet" href="css/products.css">
    <main>
        <div class="items-container" id="result">
            <?php
                $product_sql = "SELECT * FROM products WHERE userid='$userid'";
                $product_result = mysqli_query($conn, $product_sql);
                if(mysqli_num_rows($product_result)>0){
                    while($product_row = mysqli_fetch_assoc($product_result)){
                        echo "
                            <div class='item-box'>
                                <img src='../stores/assets/images/product_image/$product_row[product_image]' alt='$product_row[product_name]'>
                                <div class='item-tag'>
                                    <div class='item-name'>$product_row[product_name]</div>
                                    <div class='item-price'>
                                        <h3>category - $product_row[category]</h3>
                                        <p>NGN $product_row[selling_price]</p>
                                    </div>
                                    <!--add to cart-->
                                    <div class='icons'>
                                        <a href='#' class='atc' title='copy single link'><i class='fa fa-link copy'><span style='display:none;'>localhost/venormall/stores/s/product-$product_row[product_code]-$userid</span></i></a>
                                        <a href='#' class='atc' title='edit $product_row[product_name]'><i class='fa fa-bars'></i></a>
                                    </div>
                                </div>
                            </div>
                            ";
                            }
                        }
                        else{
                            echo "no produt added yet";
                        }
                        include("../stores/notify.html");
                    ?>
        </div>
        <script>
            $(".copy").click(function() {
                var name = $(this).text();

                var input = document.createElement("input");
                input.value = name;
                document.body.appendChild(input);

                input.select();
                input.setSelectionRange(0, 99999); /* For mobile devices */

                document.execCommand("copy");
                document.body.removeChild(input);
                document.getElementById("productmessage").innerText = "Product url copied."
                showNotification()
                setTimeout(closenotification,1000)

                //alert("Copied: " + name);
            });
        </script>
    </main>
</body>

</html>