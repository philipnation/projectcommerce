<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vernormall</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <script src="js/script.js"></script>
</head>

<body>
    <div class="nav-container">
        <nav class="top-nav">
            <div class="home-link">
                <a href="index.php">Back to dashboard</a>
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
                                    <li><a href='settings.php'>My account</a></li>
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
            <div class="cancel-btn-cont" title="Cancel">
                <button class="cancel-btn"><a href="index.php">&times;</a></button>
            </div>
        </nav>
    </div>
    <section>
        <div class="container">
            <h5>General</h5>
            <div class="content">
                <form>
                    <div class="desc-container">
                        <div class="form-groups">
                            <label for="text"><span>*</span>Brand</label>
                            <div class="input-box">
                                <input type="text" required>
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="url"><span>*</span>URL</label>
                            <div class="input-box">
                                <input type="url" required>
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="text"><span>*</span>Retail Price</label>
                            <div class="input-box">
                                <input type="text" required>
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="text"><span>*</span>Selling Price</label>
                            <div class="input-box">
                                <input type="text" required>
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="text"><span>*</span>Mobile</label>
                            <div class="input-box">
                                <input type="tel" required maxlength="16" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="text"><span>*</span>Email</label>
                            <div class="input-box">
                                <input type="email" required>
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="text"><span>*</span>Address</label>
                            <div class="input-box">
                                <input type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="product-pic-cont">
                        <header>Add product image</header>
                        <div class="product-pic">
                            <label for="file" class="img-label">
                                <span class="glyphicon gylphicon-camera"></span>
                                <span>Add Image</span>
                            </label>
                            <input type="file" id="file" onchange="loadFile(event)"/>
                            <img src="images/car.jpg" id="output" width="200">
                        </div>
                    </div>
                    <div class="product-desc">
                        <header>Product Description</header>
                        <textarea name="" id="" required></textarea>
                    </div>
                    <div class="add">
                        <button class="add-btn">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="applications">
            <div class="part">
                <h1>Show in store</h1>
                <p>Added item will be available in store</p>
            </div>
            <div class="part">
                <h1>Product URL</h1>
                <p>Enter the desired product url.</p>
                <p>It will be used to access the product directly from your browser</p>
            </div>
            <div class="part">
                <h1>Retail price</h1>
                <p>Enter the original amount of the product.</p>
                <p>It will be displayed next to the selling price and will be crossed out as discount.</p>
            </div>
            <div class="part">
                <h1>Selling price</h1>
                <p>Enter the amount you are offering the product.</p>
            </div>
            <div class="part">
                <h1>Address</h1>
                <p>Should contain the seller address.</p>
            </div>
        </div>
    </section>
</body>

</html>