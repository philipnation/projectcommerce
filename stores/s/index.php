<?php
include("../../handlers/conn.php");

$userid = $_GET['userid'];
$productid = $_GET['productid'];
session_start();
$_SESSION['single_product_id'] = $productid;
$_SESSION['single_userid'] = $userid;

$sql = "SELECT * FROM products WHERE userid='$userid' AND product_code = '$productid'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['single_price'] = $row['product_price'];
    }
    else{
        echo 'Invalid url';
    }
} else {
    // Display the MySQL error message for debugging
    echo "Error: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($row['product_name'])){echo $row['product_name'];}else{echo 'error';} ?></title>

    <!--Font familiy-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <!--Bootstrap Stylings-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <!--Font awesome icons-->
    <link rel="stylesheet" href="assets/font/css/all.css">

    <!--Local Stylings-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile.css">

    <!--Ajax cnd-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Bootstrap js-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            // Add a click event listener to the button
            $('#btn-next').click(function() {
                // Make an AJAX request
                $.ajax({
                    url: 'details', // Replace with the actual URL of your server-side script
                    type: 'GET',
                    success: function(response) {
                        // Replace the contents of div1 with the fetched details
                        $('#item-details').html(response);
                    },
                    error: function() {
                        alert('Error occurred while fetching details.');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <main>
        <div class="item-image">
            <div class="header">
                <div><a href="#"><i class="fa fa-home"></i></a></div>
                <div><a href="mailto:"><i class="fa fa-envelope"></i></a></div>
            </div>
            <p class="p-name"><?php echo $row['product_name'] ?></p>
            <div class="img-images">
                <div><hr></div>
                <div><a href="../assets/images/product_image/<?php echo $row['product_image'] ?>"><img src="../assets/images/product_image/<?php echo $row['product_image'] ?>" alt=""></a></div>
                <div><hr></div>
            </div>
        </div>

        <div class="item-details" id="item-details">
            <div class="header">
                <div><?php echo $row['product_price'] ?></div>
                <div><i class="far fa-heart"></i></div>
            </div>
            <div class="description">
                <?php echo $row['product_description'] ?>
            </div>
            <hr>
            <div class="btn-div">
                <button class="btn-next" id="btn-next">Fill order details</button>
            </div>
        </div>
    </main>
</body>
</html>