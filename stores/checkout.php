<?php
include("inc/header.php");
if(!isset($_SESSION['shopping_cart'])){
	echo "<script>location.href = 'home'</script>";
}
?>


        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<!--<div class="checkout-discount">
            				<form action="#">
        						<input type="text" class="form-control" required id="checkout-discount-input">
            					<label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
            				</form>
            			</div>--><!-- End .checkout-discount -->
            			<form action="placeorder" method="post">
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Delivery Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>First Name *</label>
		                						<input type="text" name="firstname" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Last Name *</label>
		                						<input type="text" name="lastname" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	            						<label>Country *</label>
	            						<input type="text" name="country" class="form-control" required>

	            						<label>Address *</label>
	            						<input type="text" name="address" class="form-control" placeholder="House number and Street name" required>

	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>Town / City *</label>
		                						<input type="text" name="city" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>State *</label>
		                						<input type="text" name="state" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" name="phone" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	                					<label>Email address *</label>
	        							<input type="email" name="email" class="form-control" required>

	        							<div class="custom-control custom-checkbox">
											<input type="radio" name="payment_method" class="custom-control-input" value="Payment on delivery" id="checkout-create-acc" required>
											<label class="custom-control-label" style="background-color: #fff" for="checkout-create-acc">Payment on delivery</label>
										</div>

										<div class="custom-control custom-checkbox">
											<input type="radio" name="payment_method" class="custom-control-input" style="background-color: #fff" value="Online payment" id="checkout-diff-address" required>
											<label class="custom-control-label" for="checkout-diff-address">Online payment</label>
										</div>

	                					<label>Order notes (optional)</label>
	        							<textarea class="form-control" name="note" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
                                            <?php	
                                            $total_price = 0;	
                                                foreach ($_SESSION["shopping_cart"] as $product){
													$price = $product['unit_price']*$product['item_quantity'];
                                                    $total_price += $price;
                                                    echo "
                                                    <tr>
                                                        <td><a href='#'>$product[item_name]</a></td>
                                                        <td>&#8358;$price</td>
                                                    </tr>";
                                                }
                                            ?>
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td><?php echo $currency.number_format($total_price); ?></td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>Shipping:</td>
		                							<td><?php echo $delivery; ?></td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td style="color: <?php echo $color; ?>;">Total:</td>
		                							<td style="color: <?php echo $color; ?>;">
                                                        <?php
                                                            if($delivery == "free"){
                                                                $delivery = 0;
                                                            }
                                                            echo $currency.number_format($delivery + $total_price);
                                                        ?>
                                                    </td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" style="background-color: white;border-color: <?php echo $color; ?>;">
		                					<span class="btn-text" style="color: <?php echo $color; ?>;">Place Order</span>
		                					<span class="btn-hover-text" style="color: <?php echo $color; ?>;">Proceed</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
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
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/checkout.html  22 Nov 2019 09:55:06 GMT -->
</html>