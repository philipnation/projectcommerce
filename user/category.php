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
            <header>categories</header>
            <div class="prf-img-up" style="display:flex;justify-content:space-between;">
                <button class="update-button btn-body" onclick="document.getElementById('add_media_form').style.display = 'block'"><i class="fa fa-plus"></i> add</button>
                <button class="update-button btn-body" onclick="document.getElementById('update_media_form').style.display = 'block'"><i class="fa fa-gear"></i> update</button>
            </div>
            <!-- Form for adding new social media link-->
            <!-- start-->
            <div class="update-details" id="add_media_form" style="display: none;">
                <div class="form-groups-cont">
                    <div class='form-groups'>
                        <label for=''>category name</label>
                        <div class='input-box'>
                            <input type='text' placeholder="" id="media_link">
                        </div>
                    </div>
                    <div class="prf-img-up">
                        <button class="update-button btn-body" id="add_media">add category</button>
                    </div>
                </div>
            </div>
            <!--end add social medial link-->

            <!-- Form for updating social media link-->
            <!-- start-->
            <div class="update-details" id="update_media_form" style="display: none;">
                <div class="form-groups-cont">
                <div class='form-groups'>
                    <label for=''>old name</label>
                    <div class='input-box'>
                        <select name="media_name" id="media_name" style="font-size: 9pt;">
                        <?php
                            $social_media_sql = "SELECT * FROM categories WHERE userid='$userid'";
                            $social_media_result = mysqli_query($conn, $social_media_sql);
                            if(mysqli_num_rows($social_media_result) > 0){
                                while($social_media_row = mysqli_fetch_assoc($social_media_result)){
                                    echo "
                                    <option value='$social_media_row[category]'>$social_media_row[category]</option>
                                    ";
                                }
                            }
                            else{
                              echo "<option value='none'>no category added</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
                    <div class='form-groups'>
                        <label for=''>new name</label>
                        <div class='input-box'>
                            <input type='text' placeholder="" id="media_update_link">
                        </div>
                    </div>
                    <div class="prf-img-up">
                        <button class="update-button btn-body" id="update_media">add category</button>
                    </div>
                </div>
            </div>
            <!--end update social medial link-->


            <div class="update-details">
                <div class="form-groups-cont">
                    <?php
                    $social_media_sql = "SELECT * FROM categories WHERE userid='$userid'";
                    $social_media_result = mysqli_query($conn, $social_media_sql);
                    if(mysqli_num_rows($social_media_result) > 0){
                        while($social_media_row = mysqli_fetch_assoc($social_media_result)){
                            echo "
                            <div class='form-groups'>
                                <label for=''></label>
                                <div class='input-box'>
                                    <input type='text' value='$social_media_row[category]' readonly>
                                </div>
                            </div>
                            ";
                        }
                    }
                    else{
                        echo "<small>no category added</small>";
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
		var link = $("#media_link").val();
        $.post("includes/add_category.php", {
            //The building_unique_id is the post array and then the second onces are the variables
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
		var old_name = $("#media_name").val();
        var new_name = $("#media_update_link").val();
        $.post("includes/add_category.php", {
            //The building_unique_id is the post array and then the second onces are the variables
            old_name:old_name,
            new_name:new_name
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