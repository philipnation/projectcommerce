<?php
include("header.php");
$p_id = $_GET['productid'];
$p_result = mysqli_query($conn, "SELECT * FROM products WHERE id='$p_id' AND userid='$userid'");
$p_row = mysqli_fetch_assoc($p_result);

if(isset($_POST['add_product'])){
    /*$file=$_FILES['file'];
    $filename=$_FILES['file']['name'];
    $filetmpname=$_FILES['file']['tmp_name'];
    $filesize=$_FILES['file']['size'];
    $fileerror=$_FILES['file']['error'];
    $filetype=$_FILES['file']['type'];

    $fileext=explode('.', $filename);
    $fileactualext=strtolower(end($fileext));

    $allowed=array('jpg', 'png', 'jpeg');*/


    $product_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['product_name'], ENT_QUOTES, 'UTF-8'));
    $cost_price = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cost_price'], ENT_QUOTES, 'UTF-8'));
    $selling_price= mysqli_real_escape_string($conn, htmlspecialchars($_POST['selling_price'], ENT_QUOTES, 'UTF-8'));
    $product_category = mysqli_real_escape_string($conn, htmlspecialchars($_POST['category'], ENT_QUOTES, 'UTF-8'));
    $stock = mysqli_real_escape_string($conn, htmlspecialchars($_POST['stock'], ENT_QUOTES, 'UTF-8'));
    $product_description = mysqli_real_escape_string($conn, htmlspecialchars($_POST['product_description'], ENT_QUOTES, 'UTF-8'));
    //$product_code = product_code();

    /*if (in_array($fileactualext, $allowed)){
        if ($filesize<5000000000){
            $rand_no = rand(100, 100000);
            $filenamenew=$name.$rand_no.".".$fileactualext;
            $filedestination='../stores/assets/images/product_image/'.$filenamenew;
            move_uploaded_file($filetmpname, $filedestination);*/
            $add_sql=mysqli_query($conn,"UPDATE products SET category='$product_category',product_name='$product_name',product_price='$selling_price',amount_in_stock='$stock',product_description='$product_description',cost_price='$cost_price',selling_price='$selling_price' WHERE id='$p_id' AND userid='$userid'");
            $result=mysqli_query($conn, $add_sql);
            header("location: ./products");
        /*}else{
            echo "too large";
        }

    }
    else{
        echo "video must be jpg, jpeg or mp4";
    }*/
}
?>
<html lang="en">

<body>
    <div class="add-body">
        <div class="add-container">
            <header>General</header>
            <div class="add-form-box">
                <form action="#" method="post" enctype='multipart/form-data'>
                    <div class="added-item-details">
                        <div class="form-groups">
                            <label for="">Product name <span>*</span></label>
                            <div class="input-box">
                                <input type="text" name="product_name" value="<?php echo $p_row['product_name'] ?>" required>
                            </div>
                        </div>
                        <!--<div class="form-groups">
                            <label for="">url <span>*</span></label>
                            <div class="input-box">
                                <input type="url" required>
                            </div>
                        </div>-->
                        <div class="form-groups">
                            <label for="">retail / cost price <span>*</span></label>
                            <div class="input-box">
                                <input type="number" name="cost_price" value="<?php echo $p_row['cost_price'] ?>" required>
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="">selling price <span>*</span></label>
                            <div class="input-box">
                                <input type="Number" name="selling_price" value="<?php echo $p_row['product_price'] ?>" required>
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="">category <span>*</span></label>
                            <div class="input-box">
                                <select name="category" id="" style="width: 100%;height:35px;color:grey;font-size:8pt;">
                                    <option value="<?php echo $p_row['category'] ?>"><?php echo $p_row['category'] ?></option>
                                    <?php
                                    $category_sql = "SELECT * FROM categories WHERE userid='$userid'";
                                    $category_result = mysqli_query($conn, $category_sql);
                                    if(mysqli_num_rows($category_result)>0){
                                        while($category_row = mysqli_fetch_assoc($category_result)){
                                            if($category_row['category'] == $p_row['category']){

                                            }
                                            else{
                                                echo "<option value='$category_row[category]'>$category_row[category]</option>";
                                            }
                                        }
                                    }
                                    else{
                                        echo "<option value='none'>no category available</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="">amt in stock <span>*</span></label>
                            <div class="input-box">
                                <input type="number" name="stock" value="<?php echo $p_row['amount_in_stock'] ?>">
                            </div>
                        </div>
                        <div class="form-groups">
                            <label for="">description</label>
                            <div class="input-box">
                                <textarea name="product_description" id="" cols="30" rows="3" style="width:100%;resize:none;font-size:8pt;"><?php echo $p_row['product_description'] ?></textarea>
                            </div>
                        </div>
                        <!--<div class="form-groups">
                            <label for="">add image</label>
                            <div class="input-box">
                                <input type="file" name="file" id="profile-image" accept="image/*" required>
                            </div>
                        </div>-->
                        <button class="body-btn" name="add_product" style="color:#fff;">update product</button>
                    </div><!-- accept="image/*"-->
                </form>
            </div>
        </div>
        <div class="add-pro">
            <div class="rules">
                <h1>show in store</h1>
                <p>Added product will be availabel in mystore</p>
            </div>
            <div class="rules">
                <h1>Retail price</h1>
                <p>This will be the price you used to purchase the product.</p>
            </div>
            <div class="rules">
                <h1>Selling  price</h1>
                <p>This will be mapped out as the amount the product is being sold.</p>
            </div>
            <div class="rules">
                <h1>AMount in stock</h1>
                <p>Should contain the total amount of the product you have for now.</p>
            </div>
            <div class="rules">
                <h1>Images</h1>
                <p>The product identity</p>
            </div>
        </div>
    </div>
</body>
</html>