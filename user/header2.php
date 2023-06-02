<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>
    <div class="nav-container">
        <nav class="top-nav">
            <div class="home-link">
                <a href="dashboard.php">Back to dashboard</a>
            </div>
            <div class="rt-container">
                <div class="profile">
                    <div class="profile-img-cont">
                        <img src="images/profile.png" onclick="showProfile()" id="profile_btn">
                    </div>
                    <div class="profile-dropdown-cont" id="profile_dropdown">
                        <div class="profile-dropdown">
                            <div class="desc">
                                <h3>Account Name</h3>
                                <p>Kay_shot@gmail.com</p>
                            </div>
                            <div class="profile-content">
                                <ul>
                                    <li><a href='#'>My store</a></li>
                                    <li><a href='#'>My account</a></li>
                                    <li><a href='#'>Subscriptions</a></li>
                                    <li><a href='#'>Signout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="cancel-nav">
            <div class="page-name">Add Product</div>
            <div class="cancel-btn-cont">
                <button class="cancel-btn"><a href="dashboard.php">&times;</a></button>
            </div>
        </nav>
    </div>
</body>

</html>