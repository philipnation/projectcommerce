<?php
include("inc/header.php");
if(!isset($_SESSION['customer_name'])){
  header("Location: home");
}
?>
<link rel="stylesheet" href="../user/font/css/all.css">
<script src="assets/js/htp.js"></script>
<br><br>
<br><br><br>
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<span class="rounded-circle text-success" style="font-size: 30pt;display: inline-block;width: 80px;height: 80px;border: 1px solid grey;">
                        <div>
                            <i class="fa fa-check" style="color: <?php echo $color; ?>;"></i>
                        </div>
                    </span>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <div class="page-content">
                <div class="container">
                	<hr class="mt-3 mb-5 mt-md-1">
                	<div class="touch-container row justify-content-center">
                		<div class="col-md-9 col-lg-7">
                			<div class="text-center">
                			<h2 class="title mb-1">order placed</h2><!-- End .title mb-2 -->
                			<p class="lead" style="color: <?php echo $color; ?>;">
                				Your order has been successfully placed. Rest assured, we will promptly attend to your request and provide a timely response.
                			</p><!-- End .lead text-primary -->
                			<p class="mb-3">
                                Thank you for placing your order! We appreciate your time and will process your request with utmost care. If you have any questions or need further assistance, feel free to contact our support team.
                            </p>
                			</div><!-- End .text-center -->

                			<div class="contact-form mb-2"><!--was form-->
								<div class="text-center">
                                    <button class="btn btn-outline-primary-2 btn-minwidth-sm" style="color: <?php echo $color; ?>;border-color: <?php echo $color; ?>;background-color: #fff;">
	                					<span><a href="./" style="color: <?php echo $color; ?>;">HOME</a></span>
	            						<i class="icon-long-arrow-left"></i>
	                				</button>
	                				<button class="btn btn-outline-primary-2 btn-minwidth-sm" onclick="printChart()" style="color: <?php echo $color; ?>;border-color: <?php echo $color; ?>;background-color: #fff;">
	                					<span>PRINT ORDER RECEIPT</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
                				</div><!-- End .text-center -->
                			</div><!-- End .contact-form --><!--was/form-->

                                <div class="row">
                                  <div class="col-md-6 offset-md-3" id="receipt">
                                    <div class="text-center">
                                      <h3><?php echo $storename ?> store</h3>
                                      <p><?php echo $storerow['store_description'] ?></p>
                                      <hr>
                                      <h3>Receipt</h3>
                                    </div>
                                    <div>
                                      <p><strong>Customer Name: <?php echo $_SESSION['customer_name'] ?></strong></p>
                                      <p><strong> Address: <?php echo $_SESSION['customer_address'] ?></strong></p>
                                      <p>Order id: #<?php echo $_SESSION['order_id'] ?></p>
                                      <hr>
                                      <table class="table">
                                        <thead style="background-color: grey;color:white;">
                                          <tr>
                                            <th style="color: white;">Products</th>
                                            <th style="color: white;">Price</th>
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
                                                        <td>$product[item_name]($product[item_quantity])</td>
                                                        <td colspan='2'>$currency$price</td>
                                                    </tr>";
                                                }
                                        ?>
                                          <tr>
                                            <td colspan="1" class="text-right" style="color: grey;"><strong>Total:</strong></td>
                                            <td><strong><?php echo $currency.$total_price ?></strong></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <hr>
                                      <p>Thank you for shopping with us.</p>
                                      <p>N:B</p>
                                      <p style="color:red;" class="small">
                                        You will be contacted as soon as possible.
                                      </p>
                                    </div>
                                  </div>
                                </div>
                		</div><!-- End .col-md-9 col-lg-7 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
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
    <script>
      function printChart() {
        //alert(1)
        var element = document.querySelector('#receipt');
        html2pdf().from(element).save('receipt');//chart will be the name of the file.
        setTimeout(function(){
          //console.log("successful")
          location.href = 'home'
        }, 8000)
      }
    </script>
</body>


<!-- molla/checkout.html  22 Nov 2019 09:55:06 GMT -->
</html>