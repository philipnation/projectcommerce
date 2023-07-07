<footer class="footer footer-2">
            <div class="icon-boxes-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Fast delivery</h3><!-- End .icon-box-title -->
                                    <p>Customers can expect their orders to be shipped quickly and delivered to their doorstep in a timely manner.</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Safe payment</h3><!-- End .icon-box-title -->
                                    <p>Pay with the world's most popular and secure payment method</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">24/7 customer support</h3><!-- End .icon-box-title -->
                                    <p>We offer an extreme support to you from your clicks to your delivery.</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Send us Direct message</h3><!-- End .icon-box-title -->
                                    <p>send us a DM and we reply quickly</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->

        	<div class="footer-middle">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-12 col-lg-6">
	            			<div class="widget widget-about">
	            				<img style="height: 30px;width:30px;object-fit:cover;" src="assets/images/logo/<?php echo $storerow['logo']?>" class="<?php echo $storename ?>" alt="Footer Logo" width="105" height="25">
                                <p><?php echo $about; ?></p>
	            				
	            				<div class="widget-about-info">
	            					<div class="row">
	            						<div class="col-sm-6 col-md-4">
	            							<span class="widget-about-title">Got Question? Call us 24/7</span>
	            							<a class="small" href="tel:<?php echo $tel ?>"style="color:<?php echo $color ?>;"><?php echo $tel ?></a>
	            						</div><!-- End .col-sm-6 -->
	            					</div><!-- End .row -->
	            				</div><!-- End .widget-about-info -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-12 col-lg-3 -->

	            		<div class="col-sm-4 col-lg-2">
	            			<div class="widget">
	            				<h4 class="widget-title">Information</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
                                    <li><a href="cart">View Cart</a></li>
	            					<li><a href="checkout">Checkout</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-4 col-lg-3 -->

	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright">Copyright © <?php echo date("Y")." ". $storename; ?>. All Rights Reserved.</p><!-- End .footer-copyright -->

	        		<div class="social-icons social-icons-color">
	        			<span class="social-label">Social Media</span>
                        <?php
                        $sql = "SELECT * FROM social_media WHERE userid = '$userid'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<a href='$row[link]' class='social-icon social-$row[name]' title='$row[name]' target='_blank'><i class='icon-$row[name]'></i></a>";
                        }
                        ?>
    				</div><!-- End .soial-icons -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
</div>
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            
            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search product now..." required>
                <button class="btn btn-primary" type="submit" style="background-color: <?php echo $color ?>;border: 1px solid <?php echo $color ?>"><i class="icon-search"></i></button>
            </form>
            <script>
                $(document).ready(function(){

                $("#mobile-search").keyup(function(){
                    var name = $("#mobile-search").val().toLowerCase();
                    $.post("includes/search.php", {
                        sugess: name
                    }, function(data, status){
                        $("#showsearch").html(data);
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
            <ul class="mobile-cats-menu" id="showsearch"></ul>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true" style="color: <?php echo $color ?>;">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false" style="color: <?php echo $color ?>;">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li>
                                <a href="#" style="color: <?php echo $color ?>;">pages</a>
                                <ul>
                                    <li><a href="home">home</a></li>
                                    <li><a href="cart">cart</a></li>
                                    <li><a href="checkout">Checkout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                            <?php
                            $sql = "SELECT * FROM categories WHERE userid='$userid'";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<li><a href='category-$row[category]'>$row[category]</a></li>";
                            }
                            ?>
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <?php
                    $sql = "SELECT * FROM social_media WHERE userid = '$userid'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<a href='$row[link]' class='social-icon social-$row[name]' title='$row[name]' target='_blank'><i class='icon-$row[name]'></i></a>";
                    }
                ?>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->
    <script>
        /*
        const links = document.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('mouseover', e => {
                //alert(1)
                link.title = "a"
            e.preventDefault();
            });
        });*/
    </script>    