<?php
include 'header.php';
include '../stores/notify.html';
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="update-body">
    <div class="form-container">
        <!--form-->
        <div class="form">
            <header>social media links</header>
            <div class="prf-img-up" style="display:flex;justify-content:space-between;">
                <button class="update-button btn-body" onclick="document.getElementById('add_media_form').style.display = 'block'"><i class="fa fa-plus"></i> add</button>
                <button class="update-button btn-body" onclick="document.getElementById('update_media_form').style.display = 'block'"><i class="fa fa-gear"></i> update</button>
            </div>
            <!-- Form for adding new social media link-->
            <!-- start-->
            <div class="update-details" id="add_media_form" style="display: none;">
                <div class="form-groups-cont">
                    <div class='form-groups'>
                        <label for=''>name</label>
                        <div class='input-box'>
                            <select name="media_name" id="media_name" style="font-size: 9pt;">
                                <option value="none">--select social media--</option>
                                <option value="whatsapp">whatsapp</option>
                                <option value="facebook">facebook</option>
                                <option value="twitter">twitter</option>
                                <option value="instagram">instagram</option>
                            </select>
                        </div>
                    </div>
                    <div class='form-groups'>
                        <label for=''>link</label>
                        <div class='input-box'>
                            <input type='url' placeholder="" id="media_link">
                        </div>
                    </div>
                    <div class="prf-img-up">
                        <button class="update-button btn-body" id="add_media">add social media</button>
                    </div>
                </div>
            </div>
            <!--end add social medial link-->

            <!-- Form for updating social media link-->
            <!-- start-->
            <div class="update-details" id="update_media_form" style="display: none;">
                <div class="form-groups-cont">
                    <div class='form-groups'>
                        <label for=''>name</label>
                        <div class='input-box'>
                            <select name="media_name" id="media_update_name" style="font-size: 9pt;">
                                <option value="none">--select social media--</option>
                                <option value="whatsapp">whatsapp</option>
                                <option value="facebook">facebook</option>
                                <option value="twitter">twitter</option>
                                <option value="instagram">instagram</option>
                            </select>
                        </div>
                    </div>
                    <div class='form-groups'>
                        <label for=''>new link</label>
                        <div class='input-box'>
                            <input type='url' placeholder="" id="media_update_link">
                        </div>
                    </div>
                    <div class="prf-img-up">
                        <button class="update-button btn-body" id="update_media">update social media</button>
                    </div>
                </div>
            </div>
            <!--end update social medial link-->


            <div class="update-details">
                <div class="form-groups-cont">
                    <?php
                    $social_media_sql = "SELECT * FROM social_media WHERE userid='$userid'";
                    $social_media_result = mysqli_query($conn, $social_media_sql);
                    if(mysqli_num_rows($social_media_result) > 0){
                        while($social_media_row = mysqli_fetch_assoc($social_media_result)){
                            echo "
                            <div class='form-groups'>
                                <label for=''><i class='fa-brands fa-$social_media_row[name]'></i> $social_media_row[name]</label>
                                <div class='input-box'>
                                    <input type='text' value='$social_media_row[link]' readonly>
                                </div>
                            </div>
                            ";
                        }
                    }
                    else{
                        echo "<small>no social media added</small>";
                    }
                    ?>
                </div>
            </div>
            <!--<div class="prf-img-up">
                <button name="update-button" id="update-button" class="update-button">Update Profile</button>
            </div>-->
        </div><!--/form-->
    </div>
    </div>
</body>
<?php
include '../stores/notify.html';
?>
<script>
  $(document).ready(function() {
	$('#add_media').click(function() {
		var name = $("#media_name").val();
		var link = $("#media_link").val();
        $.post("includes/add_media.php", {
            //The building_unique_id is the post array and then the second onces are the variables
            name: name,
            link: link
        }, function(data, status){
            $("#notification").html(data);
            //alert(data);
            showNotification()
            document.getElementById("productmessage").innerText = "social media added"
            setTimeout(closenotification, 1000)
            setTimeout(function(){
                location.reload()
            }, 1500)
        });
	});
  });
  </script>

<script>
  $(document).ready(function() {
	$('#update_media').click(function() {
		var update_name = $("#media_update_name").val();
		var link = $("#media_update_link").val();
        $.post("includes/add_media.php", {
            //The building_unique_id is the post array and then the second onces are the variables
            update_name: update_name,
            link: link
        }, function(data, status){
            $("#notification").html(data);
            //alert(data);
            showNotification()
            document.getElementById("productmessage").innerText = "social media added"
            setTimeout(closenotification, 1000)
            setTimeout(function(){
                location.reload()
            }, 1500)
        });
	});
  });
  </script>
</html>