<?php include("inc/header.php"); //3qLmKbekhw?>
<?php
// Add the function to get the store name too
$code = $_GET['code'];
$sql = "SELECT * FROM products WHERE product_code = '$code' AND userid='$userid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row['product_name'] ?></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="assets/images/product_image/<?php echo $row['product_image'] ?>" data-zoom-image="../../kadem/images/food_stuffs/<?php echo $row['food_images'] ?>" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <br><br><br>
                                    <input id="foodid" value="<?php echo $row['id'] ?>" hidden>
                                    <input id="foodimage" value="<?php echo $row['product_image'] ?>" hidden>
                                    <input id="price1" value="<?php echo $row['product_price'] ?>" hidden>
                                    <input id="foodname" value="<?php echo $row['product_name'] ?>" hidden>
                                    <h1 class="product-title"><?php echo $row['product_name'] ?></h1><!-- End .product-title -->

                                    <!--<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div>
                                        </div>
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                    </div>-->

                                    <div class="product-price" style="color: <?php echo $color; ?>;">
                                    <?php echo $currency; ?><span id="price"><?php echo $row['product_price']; ?></span>
                                    </div><!-- End .product-price -->
                                    <?php include("notify.html") ?>
                                    <script>
                                        function change_total(){
                                            const input = document.querySelector("#qty")
                                            const total = document.querySelector("#total")
                                            const price = document.querySelector("#price")
                                            const total_price = price.innerHTML*input.value
                                            total.innerHTML = total_price
                                        }
                                    </script>
                                    <script>
                                        $(document).ready(function(){

                                        $("#add_to_cart").click(function(){
                                            //alert(1)
                                            var price = $("#price1").val();
                                            var foodname = $("#foodname").val();
                                            var foodid = $("#foodid").val();
                                            var foodimage = $("#foodimage").val();
                                            var quantity = $("#qty").val();
                                            $.post("includes/addtocart.php", {
                                                foodid:foodid,
                                                foodimage:foodimage,
                                                quantity:quantity,
                                                price:price,
                                                foodname:foodname
                                            }, function(data, status){
                                                $("#productmessage").html(data);
                                                showNotification()
                                                setTimeout(closenotification, 500)
                                                setTimeout(function() {window.location.reload()}, 600);
                                                //alert(data)
                                            });
                                        });
                                        });
                                    </script>

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input onchange="change_total()" type="number" id="qty" class="form-control" value="1" min="1" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-content">
                                        <p>Total price: <?php echo $currency; ?> <span id="total"><?php echo $row['product_price']; ?></span></p>
                                    </div>

                                    <div class="product-details-action">
                                        <a id="add_to_cart" class="btn-product btn-cart" style="color: <?php echo $color ?>;border-color: <?php echo $color ?>;background-color: #fff;cursor:pointer;"><span style="color: <?php echo $color ?>;">add to cart</span></a>

                                        <!--<div class="details-action-wrapper">
                                            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                            <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                        </div>-->
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="#"><?php echo $row['category']; ?></a>,
                                        </div><!-- End .product-cat -->

                                        <!--<div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>-->
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                            </li>-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p><?php echo $row['product_description']; ?></p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews (2)</h3>
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">Samanta J.</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class="review-date">6 days ago</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>Good, perfect size</h4>

                                                <div class="review-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                                </div><!-- End .review-content -->

                                                <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->

                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">John Doe</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class="review-date">5 days ago</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>Very good</h4>

                                                <div class="review-content">
                                                    <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                                </div><!-- End .review-content -->

                                                <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products">
                            <div class="row justify-content-center" id="products">
                                <!--Products-->
                                <?php
                                    $category = $row['category'];
                                    $sql = "SELECT * FROM products WHERE category='$category' AND userid = '$userid'";
                                    $result = mysqli_query($conn,$sql);
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
                                                    <h3 class='product-title'><a href='product.html'>$row[product_name]</a></h3><!-- End .product-title -->
                                                    <div class='product-price'>
                                                        $currency$row[product_price]
                                                    </div>
                                                </div>
                                                <div class='product-action'>
                                                    <a href='item-$row[product_code]' class='btn-product btn-cart'><span>add to cart</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        ";
                                    }
                                ?>

                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <?php include("inc/footer.php") ?>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>