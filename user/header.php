<?php
include("includes/conn.php");
session_start();
$userid = $_SESSION['id'];
$currency = "&#8358;";
if(!isset($_SESSION['id'])){
  header("location: ../login");
}
else{
  $sql = "SELECT * FROM users WHERE userid='$userid'";
  $result = mysqli_query($conn, $sql);
  $user_row = mysqli_fetch_assoc($result);

  //Get store details
  $store_sql = "SELECT * FROM store_setting WHERE userid='$userid'";
  $store_result = mysqli_query($conn, $store_sql);
  $store_row = mysqli_fetch_assoc($store_result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="<?php echo $store_row['keyword']; ?>">
  <meta name="description" content="<?php echo $store_row['store_description']; ?>">
  <meta name="author" content="<?php echo $store_row['store_name']; ?>">
  <title><?php echo $store_row['store_name'] ?> | dashboard</title>
  <link rel="icon" href="images/logo_white.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <style>
    .btn {
      border: none !important;
      box-shadow: none !important;
    }
  </style>
  <link rel="stylesheet" href="font/css/all.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/media.css">
  <link rel="stylesheet" href="font/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
  <script src="js/script.js" defer></script>
  <script src="js/ajax.js"></script>
</head>

<body>
  <div class="nav">
    <div class="lt-container">
      <div class="prev">
        <a href="#">
          <i class="fa fa-bars" id="sideffect"></i>
        </a>
      </div>
    </div>
    <div class="rt-container">
      <div class="notice">
        <?php
          $registrationDate = $user_row['reg_date'];
          $trialPeriodDays = 13; //Change 14c and it will be 15 days free trial
          $registrationTimestamp = strtotime($registrationDate);
          $trialEndDate = strtotime("+$trialPeriodDays days", $registrationTimestamp);
          $currentDate = time();
          $secondsRemaining = $trialEndDate - $currentDate;
          $daysRemaining = ceil($secondsRemaining / (60 * 60 * 24));
        ?>
        <p>
          <?php
          if($user_row['status'] == 'unpaid'){
            if($daysRemaining < 1){
              echo "Your trial has ended.";
            }
            else{
              echo "Your trial ends in $daysRemaining days";
            }
          }
          ?>
        <!--<a href="#" class="upgrade-btn"><button class="btn btn-primary body-btn">Upgrade</button></a>-->
        <a href="https://<?php echo $store_row['store_name'] ?>.venormall.com" target="_blank" class="view-str-btn1"><button class="btn btn-primary body-btn">view store</button></a>
        </p>
      </div>
      <div class="profile">
        <div class="profile-img-cont">
          <img src="<?php if($store_row['logo'] == ""){echo "images/profile.png";}else{echo "../stores/assets/images/logo/$store_row[logo]";} ?>" onclick="showProfile()" id="profile_btn">
        </div>
        <div class="profile-dropdown-cont" id="profile_dropdown">
          <div class="profile-dropdown">
            <div class="desc">
              <h3><?php echo $user_row['business_name'] ?></h3>
              <p><?php echo $user_row['email'] ?></p>
            </div>
            <div class="profile-content">
              <ul>
                <li><a href='store'>My store</a></li>
                <li><a href='settings'>My account</a></li>
                <li><a href='payment'>Subscriptions</a></li>
                <li><a href='./includes/logout'>Signout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="sidebar">
    <div class="links">
      <a href='index'>
        <i class="fa fa-home"></i>
        Dashboard
      </a>
    </div>
    <div class="links">
      <a href="orders">
        <i class="fa fa-shopping-cart"></i>
        Orders
      </a>
    </div>
    <div class="links">
      <a href="products">
        <i class="fa fa-tags"></i>
        Products
      </a>
    </div>
    <div class="links"><a href="category">
        <i class="fa fa-search"></i>
        Categories
      </a>
    </div>
    <div class="links">
      <a href="report">
        <i class="fa fa-pencil"></i>
        Report
      </a>
    </div>
    <div class="links">
      <a href="settings">
        <i class="fa fa-gear"></i>
        Settings
      </a>
    </div>
    <div class="links">
      <a href="media">
        <i class="fa fa-bullhorn"></i>
        social media
      </a>
    </div>
    <div class="links">
      <a href="payment">
        <i class="fa fa-dollar"></i>
        payment
      </a>
    </div>
    <div class="cover-space"></div>
    <div class="links">
      <a href="store">
        <i class="fa fa-gear"></i>
        Site settings
      </a>
    </div>
    <div class="links">
      <a href="invite">
        <i class="fa fa-users"></i>
        Referral - Vcredit
      </a>
    </div>
  </div>
</body>

</html>