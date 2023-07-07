<a href="https://wa.me/+2348120188577" target="_blank">
	<div style="position: fixed; left: 1%; bottom: 0%; transform: translateY(-50%); background-color: #0D0E52; width: 60px; height: 60px; border-radius: 50%; text-align: center;">
		<span style="display: inline-block;font-size:18pt;text-align:center;margin-top:12px;color:white;">
			<i class="fa-brands fa-whatsapp"></i>
		</span>
	</div>
</a>
<div class="container pt-4 pb-5 mb-5" data-aos="fade-up">
	<div class="pb-4 text-center">
		<h2><strong><span class="text-secondary">subscribe</span> to our newsletter</strong></h2>
		<p class="text-muted">
			Get exclusive updates on our products and services.
		</p>
	</div>
	<div class="alert alert-green shadow-lg" role="alert" id="notificationbody" style="display: none;">
		<span id="notification"></span>
	</div>
	<div class="row justify-content-center"><!--was form-->
		<!--
		<div class="col-md-3">
			<input type="text" class="form-control input-round w-100 form-control-lg" placeholder="First name*">
		</div>
		-->
		<div class="col-md-3">
			<input type="text" id="newsemail" class="form-control form-control-lg" placeholder="E-mail address*">
		</div>
		<div class="col-md-3">
			<button type="submit" id="newsbtn" class="btn btn-info btn-lg w-100" style="background-color: #0D0E52;color: white;">subscribe</button>
		</div>
	</div><!--was form-->
</div>
<!-- End CTA -->
<script src="assets/js/ajax.js"></script>
                <script>
                $(document).ready(function() {
                  $('#newsbtn').click(function() {
                      var newsemail = $("#newsemail").val();
                      $.post("handlers/newsletter.php", {
						newsemail: newsemail
                      }, function(data, status){
                          $("#login_reply").html(data);
                          	//alert(data);
							const notificationbody = document.querySelector("#notificationbody")
							const notification = document.querySelector("#notification")
							notificationbody.style.display = 'block'
							notification.innerHTML = data
							setTimeout(function(){
								notificationbody.style.display = 'none'
								document.getElementById("newsemail").value = ''
							},2000)
                      });
                  });
                });
                </script>
    
<!------------------------------------------
DEMO MODAL & DONATE BUTTON ONLY - DON'T COPY
------------------------------------------->
<div style="position:fixed; bottom:20px;left:20px;">
	<a href="https://www.wowthemes.net/donate/" target="_blank">
		<!--
		<img class="rounded-circle shadow-lg" src="assets/img/demo/coffee.png" width="70" data-toggle="tooltip" data-placement="top" title="" data-original-title="Buy me a coffee!">
		-->
	</a>
</div>
<!--------------------------------------
END DEMO MODAL & DONATE BUTTON
--------------------------------------->

    
<!--------------------------------------
FOOTER
--------------------------------------->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
<path class="bg-black" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<footer class="bg-black pb-5">
<div class="container">
	<div class="row">
		<div class="col-12 col-md mr-4">
			<i class="fas fa-copyright text-white"></i>
			<small class="d-block mt-3 mb-4 text-muted">©
			<script>document.write(new Date().getFullYear())</script>
			 venormall.com  by <a target="_blank" href="#">venor team</a>.
			 </small>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Features</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Storefront Customization</a></li>
				<li><a class="text-muted" href="#">Product Catalog Management</a></li>
				<li><a class="text-muted" href="#">Shopping Cart and Checkout</a></li>
				<li><a class="text-muted" href="#">Payment Gateway Integration</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Features</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Order Management</a></li>
				<li><a class="text-muted" href="#">SEO Optimization</a></li>
				<li><a class="text-muted" href="#">Customer Reviews and Ratings</a></li>
			</ul>
		</div>
		<div class="col-6 col-md">
			<h5 class="mb-4 text-white">Infomations</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">Team</a></li>
				<li><a class="text-muted" href="about">About</a></li>
				<li><a class="text-muted" href="policy">Privacy and Policy</a></li>
				<li><a class="text-muted" href="terms">Terms</a></li>
			</ul>
		</div>
	</div>
</div>
</footer>

    
    
<!--------------------------------------
JAVASCRIPTS
--------------------------------------->    
<script src="./assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/functions.js" type="text/javascript"></script>
<script src="assets/js/words.js" type="text/javascript"></script>
    
<!-- Animation -->
<script src="./assets/js/vendor/aos.js" type="text/javascript"></script>
<noscript>
    <style>
        *[data-aos] {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
    </style>
</noscript>
<script>
    AOS.init({
        duration: 700
    });
</script>
 
<!-- Disable animation on less than 1200px, change value if you like -->
<script>
AOS.init({
  disable: function () {
    var maxWidth = 1200;
    return window.innerWidth < maxWidth;
  }
});
</script>

</body>
</html>