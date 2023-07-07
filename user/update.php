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
            <header>Update profile</header>
            <div class="update-details">
                <div class="form-groups-cont">
                    <div class="form-groups">
                        <label for="">Name <span>*</span></label>
                        <div class="input-box">
                            <input type="text" id="name" name="name" value="<?php echo $user_row['name'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">E-mail <span>*</span></label>
                        <div class="input-box">
                            <input type="email" id="email" name="email" value="<?php echo $user_row['email'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">status</label>
                        <div class="input-box">
                            <input type="text" value="<?php echo $user_row['action'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">Mobile <span>*</span></label>
                        <div class="input-box">
                            <input type="tel" id="mobile" name="mobile" pattern='[0-9]{10,}'  value="<?php echo $user_row['phone_number'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">Business name<span>*</span></label>
                        <div class="input-box">
                            <input type="text" id="business_name" name="business_name" value="<?php echo $user_row['business_name'] ?>">
                        </div>
                    </div>
                    <div class="form-groups">
                        <label for="">Referral code</label>
                        <div class="input-box">
                            <input type="text" value="<?php echo $user_row['ref_code'] ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prf-img-up">
                <!--<div class="image-cont">
                    <header>Update profile picture</header>
                    <div class="image-box">
                        <label for="profile-image">Update profile picture</label>
                        <input type="file" id="profile-image" accept="image/*" name="profile-image">
                        <img src="images/profile.png" id="preview-image">
                    </div>
                </div>-->
                <button name="update-button" id="update-button" class="update-button">Update Profile</button>
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
		var name = $("#name").val();
		var business_name = $("#business_name").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
        $.post("includes/update_account.php", {
            //The building_unique_id is the post array and then the second onces are the variables
            name: name,
			business_name: business_name,
			email: email,
			mobile: mobile
        }, function(data, status){
            $("#notification").html(data);
            //alert(data);
            showNotification()
            document.getElementById("productmessage").innerText = "updated"
            setTimeout(closenotification, 1000)
        });
	});
  });
  </script>
</html>