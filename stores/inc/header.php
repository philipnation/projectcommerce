<?php
include("includes/conn.php");
//store name gotten as variable from the function that will get return the subdomain.
$storename = 'philip';
//Get the user id from the store_setting table using the store name.
$sql = "SELECT * FROM store_setting WHERE store_name = '$storename'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $storerow = mysqli_fetch_assoc($result);
    //Get the user's userid from the users table
    $sqlresult = mysqli_query($conn, "SELECT * FROM users WHERE userid = '$storerow[userid]'");
    $sqlresultrow = mysqli_fetch_assoc($sqlresult);
    //Check if the account is active.
    if($sqlresultrow['action'] == 'inactive'){ 
        include("./maintain.html");
        exit();
    }
    else{
        session_start();
        $userid = $storerow['userid'];
        $_SESSION['userid'] = $userid;
        $color = $storerow['store_color'];
        $_SESSION['delivery_fee'] = $delivery = $storerow['delivery_fee'];
        $about = $storerow['store_description'];
        $currency = "&#8358;";
        $tel = $storerow['tel'];
    }
}
else{
    header("Location: 404.html");
}
//Gotten the userid
if(!empty($_SESSION["shopping_cart"])) {
    $total_price = 0;
    foreach ($_SESSION["shopping_cart"] as $product){
        $product["item_name"] = 1;
        $total_price += $product["item_name"];
        
    }
}
else{
    $total_price = 0;
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- molla/index-1.html  22 Nov 2019 09:55:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $storename; ?></title>
    <meta name="keywords" content="<?php echo $storerow['keyword']; ?>">
    <meta name="description" content="<?php echo $storerow['store_description']; ?>">
    <meta name="author" content="<?php echo $storename; ?>">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo/<?php echo $storerow['logo']?>">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/<?php echo $storerow['logo']?>">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo/<?php echo $storerow['logo']?>">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/logo/<?php echo $storerow['logo']?>"><!--assets/images/icons/favicon.ico-->
    <meta name="apple-mobile-web-app-title" content="<?php echo $storename ?>">
    <meta name="application-name" content="<?php echo $storename ?>">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-2.css">
    <link rel="stylesheet" href="assets/css/demos/demo-2.css">
    <script src="js/ajax.js"></script>
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-2 header-intro-clearance" style="position:fixed; z-index:1;">
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="home" class="logo">
                            <img src="assets/images/logo/<?php echo $storerow['logo']?>" alt="<?php echo $storename ?>" width="105" height="25" style="height: 30px;width:30px;object-fit:cover;">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>
                    <script>
                        $(document).ready(function(){

                        $("#q").keyup(function(){
                            var name = $("#q").val().toLowerCase();
                            $.post("includes/search.php", {
                                sugess: name
                            }, function(data, status){
                                $("#showsearch-desktop").html(data);
                                var search = document.getElementById("showsearch")
                                if (search.innerHTML == ''){
                                    search.style.display = 'none'
                                }
                                else{
                                    search.style.display = 'block'
                                }
                            });
                        });
                        });
                    </script>

                    <div class="header-right">
                        <!--<div class="account">
                            <a href="register" title="My account">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <p>Account</p>
                            </a>
                        </div>-->
                        <!-- End .compare-dropdown -->

                        <!--<div class="wishlist">
                            <a href="wishlist.html" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">3</span>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div>-->
                        <!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart" style="color: <?php echo $color ?>;"></i>
                                    <span class="cart-count" style="background-color: <?php echo $color ?>;"><?php echo $total_price; ?></span>
                                </div>
                                <p>Cart</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                        <div class="dropdown-cart-action">
                                            <a href="cart" class="btn btn-primary" style="background-color: <?php echo $color ?>;border: 1px solid <?php echo $color ?>;">View Cart</a>
                                            <a href="checkout" class="btn btn-outline-primary-2" style="border: 1px solid <?php echo $color ?>;color: #000;background-color: #fff;"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .dropdown-cart-total -->
                                        <?php
                                            if(!empty($_SESSION["shopping_cart"])) {		
                                            foreach ($_SESSION["shopping_cart"] as $product){
                                        ?>
                                        <?php
                                            $c = "SELECT * FROM products WHERE id = '$product[item_id]' AND userid='$userid'";
                                            $d = mysqli_query($conn, $c) or die (mysqli_error($conn));
                                            while ($row = mysqli_fetch_assoc($d)){
                                                $id = $row['id'];
                                                $food_image = $row['product_image'];
                                                $food_description = $row['product_description'];
                                            echo "
                                            <div class='product'>
                                                <div class='product-cart-details'>
                                                    <h4 class='product-title'>
                                                        <a href='product.html'>$product[item_name]</a>
                                                    </h4>

                                                    <span class='cart-product-info'>
                                                        <span class='cart-product-qty'>$product[unit_price]</span>
                                                        x $product[item_quantity]
                                                    </span>
                                                </div><!-- End .product-cart-details -->

                                                <figure class='product-image-container'>
                                                    <a href='product.html' class='product-image'>
                                                        <img src='assets/images/product_image/$product[product_image]' alt='product'>
                                                    </a>
                                                </figure>
                                            </div><!-- End .product -->
                                            ";
                                            }
                                        }
                                    }
                                    else{
                                        echo '<p style="text-align:center;">no item is in your cart</p>';
                                    }
                                        ?>

                                <!--/<div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price"><?php echo $total_price ?></span>
                                </div>--><!-- End .dropdown-cart-total -->

                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" style="background-color: transparent;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Categories">
                                Categories
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <?php
                                        $sql = "SELECT * FROM categories WHERE userid='$userid'";
                                        $result = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<li><a href='category-$row[category]'>$row[category]</a></li>";
                                        }
                                        ?>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container">
                                    <a href="home" class="sf-with-ul" style="color: <?php echo $color ?>;">Home</a>
                                </li>

                                <!--
                                <li>
                                    <a href="elements-list.html" class="sf-with-ul">Elements</a>

                                    <ul>
                                        <li><a href="elements-products.html">Products</a></li>
                                        <li><a href="elements-typography.html">Typography</a></li>
                                        <li><a href="elements-titles.html">Titles</a></li>
                                        <li><a href="elements-banners.html">Banners</a></li>
                                        <li><a href="elements-product-category.html">Product Category</a></li>
                                    </ul>
                                </li>
                                -->
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        <!--<i class="la la-lightbulb-o"></i>--><p><?php echo $storename; ?></p>
                    </div>
                </div><!-- End .container -->
                <ul class="mobile-cats-menu" id="showsearch-desktop"></ul>
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->