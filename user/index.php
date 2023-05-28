<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="body">
        <div class="container">
            <div class="sub-container">
                <div class="info-alert">
                    <div>
                        <i class="fa fa-warning"></i>
                    </div>
                    <div>
                        Dear valued customer, your trial period is set to conclude in just 12 days. 
                        To ensure uninterrupted access to our exceptional services, we kindly request you to complete 
                        your payment before the deadline. Don't miss out on the incredible benefits and features we have to offer! 
                        Click <a href="#">here</a> to conveniently proceed with your payment and continue enjoying our top-notch services.
                    </div>
                    <div>
                        <i class="fa fa-x" onclick="document.querySelector('.info-alert').style.display = 'none'"></i>
                    </div>
                </div>
                <div class="header">
                    <h1>Venor Mall</h1>
                    <p>manage your ecommerce store with ease</p>
                </div>
                <div class="content-container">
                    <div class="content">
                        <div class="content-sub">
                            <div class="desc-cont">
                                <div class="desc-img-container">
                                    <img src="images/opt.svg">
                                </div>

                                <div class="desc">
                                    <h3>Add Products</h3>
                                    <div class="sub-desc">
                                        <p>Let's roll your products out!</p>
                                        <p>Showcase your products with extreme descriptions.The more detailed,the better.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="button-cont">
                                <button class="btn btn-primary body-btn"><a href='add.php'>Add Products</a></button>
                            </div>
                        </div>
                        <div class="content-sub">
                            <div class="desc-cont">
                                <div class="desc-img-container">
                                    <img src="images/seo.svg">
                                </div>

                                <div class="desc">
                                    <h3>Report</h3>
                                    <div class="sub-desc">
                                        <p>Set, track and view your store's target</p>
                                        <p>Our easy-to-follow site will walk you through ever step from domain mapping to publishing</p>
                                    </div>
                                </div>
                            </div>
                            <div class="button-cont">
                                <button class="btn btn-primary body-btn"><a href='#'>view Report</a></button>
                            </div>
                        </div>
                        <div class="content-sub">
                            <div class="desc-cont">
                                <div class="desc-img-container">
                                    <img src="images/content.svg">
                                </div>

                                <div class="desc">
                                    <h3>Order</h3>
                                    <div class="sub-desc">
                                        <p>Approve your order with a simple click</p>
                                        <p>Configure your store wide taxes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="button-cont">
                                <button class="btn btn-primary body-btn"><a href='#'>View orders</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>