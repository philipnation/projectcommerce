<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isMail();
$mail->isHTML(true);

session_start();
include("conn.php");
$userid = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE userid='$userid'";
$result = mysqli_query($conn, $sql);
$user_row = mysqli_fetch_assoc($result);
if($user_row['action'] == 'inactive'){
    $current_date = date('jS F, Y');
    $due_date = date('jS F, Y', strtotime($current_date . '+30 days'));
    $payment_id = rand(10000, 999999);
    mysqli_query($conn, "INSERT INTO payment(userid,payment_id,paid_date,due_date,status) VALUES('$userid','$payment_id','$current_date','$due_date','paid')");
    mysqli_query($conn, "UPDATE users SET action='active', status='paid' WHERE userid='$userid'");
    $ref_result = mysqli_query($conn, "SELECT * FROM referral WHERE userid='$userid' AND action='unpaid'");
    if(mysqli_num_rows($ref_result) > 0){
        $ref_row = mysqli_fetch_assoc($ref_result);
        $ref_person = $ref_row['ref_code'];
        $person_result = mysqli_query($conn, "SELECT * FROM users WHERE userid='$userid'");
        $person_row = mysqli_fetch_assoc($person_result);
        if($person_row['plan'] == 'starter'){
            $balance = 2000;
        }
        elseif($person_row['plan'] == 'professional'){
            $balance = 5000;
        }
        elseif($person_row['plan'] == 'advanced'){
            $balance = 10000;
        }
        else{
            $balance = exit;
        }
        $person_result = mysqli_query($conn, "SELECT * FROM users WHERE ref_code='$ref_person'");
        $person_row = mysqli_fetch_assoc($person_result);
        $new_balance = $person_row['venorcredit'] + $balance;
        mysqli_query($conn, "UPDATE users SET venorcredit='$new_balance' WHERE ref_code='$ref_person'");
        mysqli_query($conn, "UPDATE referral SET action='paid' WHERE userid='$userid'");
        // Send mail to the owner of the ref code tellign the person a new amount gained
        /*
            // Sending mail
            $mail->setFrom('support@venormall.com', 'Venormall - Payment');
            $mail->addAddress($person_row['email'], $person_row['business_name']);
            $mail->Subject = "Payment Successful";
            $mail->Body = '<html><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"><body style="font-family: poppins, sans-serif;">
                    <div>
                        <div style="font-weight: bold;width:100%;height:4rem;text-align:center;color: white;background-color: rgb(30, 30, 83);">
                            PAYMENT DUE
                        </div>
                        <div style="color: black;text-align: center;font-size: 12pt;line-height: 2;">
                            Hi '.$person_row['email'].',<br>
                            We regret to inform you that your account with us has been deactivated due to an outstanding balance. We understand that unforeseen circumstances may arise, but we kindly request that you settle your account immediately in order to reactivate your services and continue enjoying the benefits of our offerings.

                                We value our customers and we strive to provide the best services possible. However, the prompt payment of your account balance is critical in helping us maintain our high level of service. If you are experiencing any difficulty in making the payment or have any questions about your account, please do not hesitate to contact us.
                                
                                We would like to thank you for your prompt attention to this matter and we look forward to hearing from you soon. Your continued patronage is greatly appreciated.
                        </div>
                    </div></body></html>';
            
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
        */
    }
    // Sending mail
    $mail->setFrom('support@venormall.com', 'Venormall - Payment');
    $mail->addAddress($user_row['email'], $user_row['business_name']);
    $mail->Subject = "Payment Successful";
    $mail->Body = '<html><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"><body style="font-family: poppins, sans-serif;">
            <div>
                <div style="font-weight: bold;width:100%;height:4rem;text-align:center;color: white;background-color: rgb(30, 30, 83);">
                    PAYMENT DUE
                </div>
                <div style="color: black;text-align: center;font-size: 12pt;line-height: 2;">
                    Hi '.$user_row['email'].',<br>
                    We regret to inform you that your account with us has been deactivated due to an outstanding balance. We understand that unforeseen circumstances may arise, but we kindly request that you settle your account immediately in order to reactivate your services and continue enjoying the benefits of our offerings.

                        We value our customers and we strive to provide the best services possible. However, the prompt payment of your account balance is critical in helping us maintain our high level of service. If you are experiencing any difficulty in making the payment or have any questions about your account, please do not hesitate to contact us.
                        
                        We would like to thank you for your prompt attention to this matter and we look forward to hearing from you soon. Your continued patronage is greatly appreciated.
                </div>
            </div></body></html>';
    
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
?>