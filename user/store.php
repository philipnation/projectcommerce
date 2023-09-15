<?php
include 'header.php';
include '../stores/notify.html';
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="update-body">
    <div class="form-container">
    <div class="form">
        <div class="prf-img-up" style="display:flex;justify-content:space-around;align-items:center;">
                <small style="text-align:center;color: rgb(0,123,255);font-size:11pt;" id="ref_code">https://<?php echo $store_row['store_name'] ?>.venormall.com</small>
                <button class="update-button btn-body" id="ref_copy"><i class="fa fa-copy"></i></button>
        </div>
    </div>
        <!--form-->
        <div class="form">
        <div class="prf-img-up" style="display:flex;justify-content:space-between;">
                <button class="update-button btn-body" onclick="document.getElementById('add_media_form').style.display = 'block'"><?php if($store_row['logo'] == ""){echo "<i class='fa fa-plus'></i>add";}else{echo "update";} ?> store image</button>
        </div>
        <!-- Form for adding new social media link-->
            <!-- start-->
            <form action="#" method="post" enctype='multipart/form-data' class="update-details" id="add_media_form" style="display: none;">
                <div class="form-groups-cont">
                    <div class='form-groups'>
                        <label for=''>image</label>
                        <div class='input-box'>
                            <input type="file" name="file" id="profile-image" accept="image/*">
                        </div>
                    </div>
                    <div class="prf-img-up">
                        <button class="update-button btn-body" name="add_image"><?php if($store_row['logo'] == ""){echo "<i class='fa fa-plus'></i>add";}else{echo "update";} ?></button>
                    </div>
                </div>
            </form>
            <!--end add social medial link-->
            <header>Update store detials</header>
            <div class="update-details">
                <div class="form-groups-cont">
                    <div class="form-groups">
                        <label for="">Store name <span>*</span></label>
                        <div class="input-box">
                            <input type="text" id="store_name" name="store_name" value="<?php echo $store_row['store_name'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">Pixel code</label>
                        <div class="input-box">
                            <input type="text" id="pixel_code" name="pixel_code" value="<?php echo $store_row['pixel_code'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">delivery fee <span style="font-size: 7pt;">if none, type free</span></label>
                        <div class="input-box">
                            <input type="text" id="delivery_fee" name="delivery_fee" value="<?php echo $store_row['delivery_fee'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">S.E.O keywords <span style="font-size: 7pt;">seperate them with comma</span></label>
                        <div class="input-box">
                            <input type="text" id="keyword" name="keyword"  value="<?php echo $store_row['keyword'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">Contact phone number <span>*</span></label>
                        <div class="input-box">
                            <input type="tel" id="tel" name="tel" value="<?php echo $store_row['tel'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">store main color <span>*</span></label>
                        <div class="input-box">
                            <input type="color" id="color" name="color" value="<?php echo $store_row['store_color'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">store short description <span>*</span></label>
                        <div class="input-box">
                            <input type="text" name="store_description" id="store_description" value="<?php echo $store_row['store_description'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">about <span>*</span></label>
                        <div class="input-box">
                            <textarea style="width: 100%;font-size:9pt;" id="about" name="about"><?php echo $store_row['about'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prf-img-up">
                <button name="update-button" id="update-button" class="update-button btn-body">Update Profile</button>
            </div> 
        </div><!--/form-->
    </div>
    </div>
</body>
<?php
include '../stores/notify.html';
?>
<script>
  $(document).ready(function() {
	$('#update-button').click(function() {
		var store_name = $("#store_name").val();
		var pixel_code = $("#pixel_code").val();
		var delivery_fee = $("#delivery_fee").val();
		var tel = $("#tel").val();
        var store_description = $("#store_description").val();
        var about = $("#about").val();
        var color = $("#color").val();
        var keyword = $("#keyword").val();
        $.post("includes/update_store.php", {
            store_name: store_name,
            pixel_code: pixel_code,
            delivery_fee: delivery_fee,
            tel: tel,
            store_description: store_description,
            about: about,
            color: color,
            keyword: keyword
        }, function(data, status){
            $("#notification").html(data);
            //alert(data);
            showNotification()
            document.getElementById("productmessage").innerText = "updated"
            setTimeout(closenotification, 1000)
            setTimeout(function(){
                location.reload()
            }, 1500)
        });
	});
  });
  </script>
</html>
<?php

if(isset($_POST['add_image'])){
    $file=$_FILES['file'];
    $filename=$_FILES['file']['name'];
    $filetmpname=$_FILES['file']['tmp_name'];
    $filesize=$_FILES['file']['size'];
    $fileerror=$_FILES['file']['error'];
    $filetype=$_FILES['file']['type'];

    $fileext=explode('.', $filename);
    $fileactualext=strtolower(end($fileext));

    $allowed=array('jpg', 'png', 'jpeg');

    if (in_array($fileactualext, $allowed)){
        if ($filesize<5000000000){
            $rand_no = rand(100, 100000);
            $filenamenew="logo".$rand_no.".".$fileactualext;
            $filedestination='../stores/assets/images/logo/'.$filenamenew;
            move_uploaded_file($filetmpname, $filedestination);
            $add_sql=mysqli_query($conn,"UPDATE store_setting SET logo = '$filenamenew' WHERE userid = '$userid'")or die(mysqli_error($conn));
            $result=mysqli_query($conn, $add_sql);
            echo "<script>location.href = 'store'</script>";
        }else{
            echo "too large";
        }

    }
    else{
        echo "video must be jpg, jpeg or mp4";
    }
}
?>
<script>
    var btn_copy = document.querySelector("#ref_copy").addEventListener("click", function() { 
        //alert(1)
        var copyText = document.createElement("textarea");
        var text =document.getElementById("ref_code").innerText
        copyText.value = text;
        document.body.appendChild(copyText);
        copyText.select();
        document.execCommand("copy");
        document.body.removeChild(copyText);
        //alert("Copied: " + text);
        document.getElementById("productmessage").innerText = "URL copied"
        showNotification()
        setTimeout(closenotification,1000)
    });
</script>