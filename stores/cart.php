<?php
error_reporting(0);
include("inc/header.php");
include("notify.html");
?>
<?php
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
<?php
if (isset($_POST['action']) && $_POST['action']=="remove"){
	
    $id=$_POST['item_id'];
    $max=count($_SESSION['shopping_cart']);
    for($i=0;$i<$max;$i++){
    if($id==$_SESSION['shopping_cart'][$i]['item_id']){
    unset($_SESSION['shopping_cart'][$i]);
    
    break;
    }
    }
    $_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
    echo "product removed";
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['item_id'] === $_POST["code"]){
        $value['item_quantity'] = $_POST["quantity"];
        $value['item_price'] = $_POST['quantity'] * $value['unit_price'];
        break; // Stop the loop after we've found the product
        }
    }
    echo "product updated";
}
?>
<script>
    $(document).ready(function(){

    $("[id^='pquantity']").change(function(){
        //alert(1)
        var code = $(this).siblings("[id^='pid']").val();
        var action = $(this).siblings("[id^='paction']").val();
        var quantity = $(this).val();
        $.post("cart.php", {
            code:code,
            action:action,
            quantity:quantity
        }, function(data, status){
            $("#productmessage").html('product added');
            showNotification()
            setTimeout(closenotification, 500)
            setTimeout(function() {window.location.reload()}, 500);
            //alert(data)
        });
    });
    });
</script>
<script>
    $(document).ready(function(){

    $("[id^='btn_remove']").click(function(){
        //alert(1)
        var item_id = $(this).siblings("[id^='item_id']").val();
        var action = $(this).siblings("[id^='action']").val();
        $.post("cart.php", {
            item_id:item_id,
            action:action
        }, function(data, status){
            $("#productmessage").html('product deleted');
            showNotification()
            setTimeout(closenotification, 500)
            setTimeout(function() {window.location.reload()}, 500);
            //alert(data)
        });
    });
    });
</script>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
                                    <?php
                    $total_price = 0;
                ?> 
                <?php		
            foreach ($_SESSION["shopping_cart"] as $product){
        ?>
        <?php
            $c = "SELECT * FROM products WHERE id='$product[item_id]' AND userid='$userid'";
            $d = mysqli_query($conn, $c) or die (mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($d)){
                $id = $row['id'];
                $food_image = $row['product_image'];
                $food_description = $row['product_description'];
                $_SESSION['total_price'] = $total_price;
                $price = $product['unit_price']*$product['item_quantity'];
                $total_price += $price;
                echo "  
                <tr>
                    <td class='product-col'>
                        <div class='product'>
                            <figure class='product-media'>
                                <a href='#'>
                                    <img src='assets/images/product_image/$food_image' alt='price'>
                                </a>
                            </figure>

                            <h6 class='product-title'>
                                <a href='#'>$product[item_name]</a>
                            </h6><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                    <td class='price-col-1'>$currency$product[unit_price]</td>
                    <td class='quantity-col'>
                        <div class='cart-product-quantity'>
                            <div method='post' action=''>
                                <input type='hidden' id='pid' name='code' value='$product[item_id]' />
                                <input type='hidden' id='paction' name='action' value='change' />
                                <input type='number' id='pquantity' class='form-control' onchange='this.form.submit()' name='quantity' value='$product[item_quantity]' min='1' step='1' data-decimals='0' required>
                            </div> 
                        </div><!-- End .cart-product-quantity -->
                    </td>
                    <td class='total-col-1' style='color: $color;'>$currency";?><?php echo number_format($price)."</td>
                    <td class='remove-col'>
                        <div method='post' action=''>
                            <input type='hidden' id='item_id' name='item_id' value='$product[item_id]' />
                            <input type='hidden' id='action' name='action' value='remove' />
                            <button class='btn-remove' id='btn_remove'><i class='icon-close'></i></button>
                        </div>
                    </td>
                </tr>
                ";
            }
        }
        if(empty($_SESSION["shopping_cart"])){
          echo "<p style='text-align:center;color:red;'>Your cart is empty</p>";
        }
        
        ?>
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<!--<div class="cart-bottom">
			            			<div class="cart-discount">
			            				<form action="#">
			            					<div class="input-group">
				        						<input type="text" class="form-control" required placeholder="coupon code">
				        						<div class="input-group-append">
													<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
												</div>
			        						</div>
			            				</form>
			            			</div>

			            			<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
		            			</div>--><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal-1">
	                							<td>Subtotal:</td>
	                							<td><?php echo $currency.number_format($total_price); ?></td>
	                						</tr><!-- End .summary-subtotal -->
                                            <tr class="summary-subtotal-1">
	                							<td>Delivery free:</td>
	                							<td><?php echo $delivery ?></td>
	                						</tr><!-- End .summary-subtotal -->

	                						<tr class="summary-total-1">
	                							<td style="color: <?php echo $color; ?>;">Total:</td>
	                							<td style="color: <?php echo $color; ?>;">
                                                    <?php
                                                    if($delivery == "free"){
                                                        $delivery = 0;
                                                    }
                                                    echo $currency;
                                                    echo number_format($delivery + $total_price);
                                                    ?>
                                                </td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="checkout" class="btn btn-outline-primary-2 btn-order btn-block" style="background-color: #fff;border: 1px solid <?php echo $color; ?>;color: <?php echo $color; ?>;">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="home" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <?php include("inc/footer.php"); ?>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->
</html>