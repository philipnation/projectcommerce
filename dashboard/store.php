<?php
include("header.php");
?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">WEBSITE SETTINGS</h4>
                  <p class="card-description">
                    You can update your websites settings
                  </p>
                  <div class="forms-sample"><!--was form-->
                    <div class="form-group">
                      <label for="exampleInputName1">Store Name</label>
                      <input type="text" class="form-control" id="store_name" value="<?php echo $store_row['store_name'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Keyword</label>
                      <input type="text" class="form-control" id="keyword" value="<?php echo $store_row['keyword'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Delivery Fee</label>
                      <input type="text" class="form-control" id="delivery_fee" value="<?php echo $store_row['delivery_fee'] ?>">
                    </div>
                    <!--<div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>-->
                    <div class="form-group">
                      <label for="exampleInputCity1">Pixel Code</label>
                      <input type="text" class="form-control" id="pixel_code" value="<?php echo $store_row['pixel_code'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Phone Number</label>
                      <input type="number" class="form-control" id="tel" value="<?php echo $store_row['tel'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Website Main Color</label>
                      <input type="color" class="form-control" id="color" value="<?php echo $store_row['store_color'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Store Description</label>
                      <textarea class="form-control" id="store_description" rows="4"><?php echo $store_row['store_description'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Store About</label>
                      <textarea class="form-control" id="about" rows="4"><?php echo $store_row['about'] ?></textarea>
                    </div>
                    <button class="btn btn-primary me-2" id="update-button">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </div><!--was /form-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!--<footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span>
        </div>
        </footer>-->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

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
            //document.getElementById("productmessage").innerText = "updated"
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
