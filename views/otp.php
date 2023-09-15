<?php
session_start();
if(!isset($_SESSION['otp'])){
  header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Verification</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      max-width: 400px;
      text-align: center;
    }

    .otp-input {
      display: flex;
      justify-content: center;
      margin-top: 2rem;
      margin: 50px;
    }

    .otp-input input {
      width: 3rem;
      height: 3rem;
      font-size: 1.5rem;
      text-align: center;
      margin-right: 0.5rem;
    }

    .submit-btn {
      display: none;
      margin-top: 2rem;
    }

    .success-message, .error-message, .otp-message {
      display: none;
      text-align: center;
      margin-top: 2rem;
    }
    .form-in{
      /*border-top: 1px solid transparent;
      border-left: 1px solid transparent;
      border-right: 1px solid transparent;*/
      box-shadow: none !important;
    }
    .form-in:focus-within{
      outline: none !important;
      border: 1px solid #000;
    }
    /* Remove the default up and down arrows for number input */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type="number"] {
      -moz-appearance: textfield; /* Firefox */
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>venormall</h3>
    <h6>Please check your email inbox for the OTP that has been sent to you.</h6>
    <div class="otp-input">
      <input type="number" maxlength="1" class="form-control form-in" id="otp1" autofocus>
      <input type="number" maxlength="1" class="form-control form-in" id="otp2">
      <input type="number" maxlength="1" class="form-control form-in" id="otp3">
      <input type="number" maxlength="1" class="form-control form-in" id="otp4">
      <input type="number" maxlength="1" class="form-control form-in" id="otp5">
      <input type="number" maxlength="1" class="form-control form-in" id="otp6">
    </div>
    <button class="btn btn-primary submit-btn" style="margin: auto;">Submit</button>
    <p class="success-message">Success! OTP Verified.</p>
    <p class="error-message">Invalid OTP</p>
    <p class="otp-message"><?php echo $_SESSION['otp'] ?></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.otp-input input').on('input', function() {
        var currentInput = $(this);
        var otpCode = '';

        currentInput.val(currentInput.val().replace(/\D/, '')); // Only allow numeric input

        $('.otp-input input').each(function() {
          otpCode += $(this).val();
        });

        if (otpCode.length === 6) {
          $('.submit-btn').show();
        } else {
          $('.submit-btn').hide();
        }

        if (currentInput.val().length === 1) {
          currentInput.next().focus();
        }
      });

      $('.submit-btn').click(function() {
        var enteredOTP = '';
        $('.otp-input input').each(function() {
          enteredOTP += $(this).val();
        });

        if (enteredOTP == document.querySelector(".otp-message").innerHTML) {
          $('.success-message').show();
          $('.error-message').hide();
          location.href = 'success_otp'
        }
        else{
          $('.error-message').show();
          $('.success-message').hide();
        }
      });
    });
  </script>
</body>
</html>
