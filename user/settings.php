<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="settings-cont">
        <div class="container" id="settings-container">
            <header class="settings-header">Profile</header>
            <div class="details-cont">
                <div class="holder-head-info">
                    <div class="lt-div">
                        <div class="img-container">
                            <img src="images/profile.png" alt="avatar.jpg">
                        </div>
                        <div class="desc">
                            <h1><?php echo $user_row['business_name'] ?></h1>
                            <p><?php echo $user_row['email'] ?></p>
                        </div>
                    </div>
                    <a href="update" class="text-light"><button class="update-btn">Edit</button></a>
                </div>
                <div class="user-info-cont">
                    <div class="user-info">
                        <div class="info-box">
                            <h1>Full Name</h1>
                            <p><?php echo $user_row['name'] ?></p>
                        </div>
                        <div class="info-box">
                            <h1>phone number</h1>
                            <p><?php echo $user_row['phone_number'] ?></p>
                        </div>
                        <div class="info-box">
                            <h1>Plan</h1>
                            <p><?php echo $user_row['plan'] ?></p>
                        </div>
                        <div class="info-box">
                            <h1>Password</h1>
                            <p>protected</p>
                            <span>store created on <?php echo $user_row['reg_date'] ?></span>
                        </div>
                    </div>
                    <!--<div class="user-info">
                        <div class="info-box">
                            <h1>Brand Name</h1>
                            <p>amakezestores</p>
                        </div>
                        <div class="info-box">
                            <h1>Country/Residence</h1>
                            <p>Niigeria</p>
                        </div>
                        <div class="info-box">
                            <h1>Address</h1>
                            <p>Gerraway</p>
                        </div>
                        <div class="info-box">
                            <h1>Mobile</h1>
                            <p>08108680457</p>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="reset-email-cont">
                <div class="reset-header">
                    <h2>My Email Address</h2>
                    <p>You can use this email to sign-in to your account and also reset your password incase you forget it.</p>
                </div>
                <div class="email-cont">
                    <div class="email-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="email-info">
                        <p><?php echo $user_row['email'] ?></p>
                        <p class="email-warning">This email address is 
                            <?php
                            if($user_row['active'] == 0){
                                echo "unverified.<a href=''>Verify Now</a>";
                            }
                            else{
                                echo "verified";
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>