<?php
session_start();
?>
<script>
    function change(parameter){
        //alert(parameter)
        const quantity = document.querySelector("#quantity")
        if(parameter == 'reduce'){
            quantity.value--
        }
        else{
            quantity.value++
        }
    }
</script>
<div class="header">
    <div><?php echo $_SESSION['single_price'] ?></div>
    <div><i class="fa fa-phone"></i></div>
</div>
<div class="description">
    Fill in order details
</div>
<hr>
<div>
    <form>
        <div class="form-control input">
                <div>
                    <span onclick="change('reduce')">-</span>
                </div>
                <div>
                    <input type="number" min="1" value="1" class="form-control" id="quantity" name="fullname" placeholder="" required>
                </div>
                <div>
                    <span onclick="change('increase')">+</span>
                </div>
        </div>
        <div class="form-control input">
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name" required>
        </div>
        <div class="form-control input">
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number" required>
        </div>
        <div class="form-control input">
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email address" required>
        </div>
        <div class="form-control input">
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter delivery Address" required>
            <!--<p class="warning">Enter Address in full e.g No 1 street, city, state, Country</p>-->
        </div>
    </form>
</div>
<div class="btn-div">
    <button class="btn-next" id="btn-next">place order <i class="fa fa-lock"></i></button>
</div>