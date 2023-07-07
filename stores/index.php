<?php
include("inc/header.php");
?>

        <main class="main"style="z-index:0;">
            <div class="intro-slider-container">
                <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
                    <div class="intro-slide" style="background-color:<?php echo $color ?>;">
                        <div class="container intro-content">
                            <br>
                            <!--<h3 class="intro-subtitle"><?php echo $storename ?></h3> End .h3 intro-subtitle -->
                            <h1 class="intro-title">shop with <br>confidence.</h1><!-- End .intro-title -->
                            <a href="#products" class="btn btn-primary">
                                <span>Shop Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-color:<?php echo $color ?>;">
                        <div class="container intro-content">
                            <h3 class="intro-subtitle">Best place to purchase.</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Your store at your hands.</h1><!-- End .intro-title -->

                            <a href="#products" class="btn btn-primary">
                                <span>Shop Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-color:<?php echo $color ?>;">
                        <div class="container intro-content">
                            <h1 class="intro-title">
                                <?php echo $storename ?><br>
                            </h1><!-- End .intro-title -->
                            <h3 class="intro-subtitle">Shop with style and confidence.</h3>

                            <a href="#products" class="btn btn-primary">
                                <span>Shop Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .owl-carousel owl-simple -->

                <span class="slider-loader text-white"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->
            
            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title">products</h2><!-- End .title -->

                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">all</a>
                        </li>
                        <?php
                            $sql = "SELECT * FROM categories WHERE userid='$userid'";
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<li class='nav-item'>
                                        <a class='nav-link' id='top-fur-link' data-toggle='tab' href='#top-fur-tab' role='tab' aria-controls='top-fur-tab' aria-selected='false' >$row[category]</a>
                                    </li>";
                            }
                        ?>
                    </ul>
                </div><!-- End .heading -->
                <script>
                    $(".nav-link").click(function(){
                        var name = $(this).html()
                        $.post("includes/test.php", {
                            name: name
                        }, function(data, status){
                            $("#products").html(data);
                            //alert(1)
                        });
                    });
                </script>

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products">
                            <div class="row justify-content-center" id="products">
                                <!--Products-->
                                <?php
                                    $sql = "SELECT * FROM products WHERE userid='$userid' ORDER BY RAND() LIMIT 40";
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

            <div class="container">
                <hr class="mt-1 mb-6">
            </div><!-- End .container -->
            
        </main><!-- End .main -->
        <?php include("inc/footer.php"); ?>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-2.js"></script>
</body>


<!-- molla/index-1.html  22 Nov 2019 09:55:32 GMT -->
</html>