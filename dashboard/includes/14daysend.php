<?php
// Connect to the database
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
include("conn.php");

// Check connection
if (!$conn) {
    echo("Connection failed");
}

// Get all active users
$sql = "SELECT * FROM users WHERE status = 'unpaid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['userid'];
        $email = $row['email'];
        $name = $row['business_name'];
        //echo $email;
        $last_paid_date = $row['reg_date'];
        
        // Check if 25 days have passed since last paid date
        $current_date = date('jS F, Y');
        $next_due_date = date('jS F, Y', strtotime($last_paid_date . '+14 days'));
        
        if ($current_date == $next_due_date) {
            $sql3 = "UPDATE users SET status='inactive' WHERE userid = '$user_id'";
            $result3 = mysqli_query($conn, $sql3);
            
            $mail->setFrom('support@venormall.com', 'Venormall - Subscription');
            $mail->addAddress($email, $name);
            $mail->Subject = "Trial ends";
            $mail->Body = '<html><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"><body style="font-family: poppins, sans-serif;">
                    <div>
                        <div style="font-weight: bold;width:100%;height:4rem;text-align:center;color: white;background-color: rgb(30, 30, 83);">
                           PAYMENT DUE
                        </div>
                        <div style="color: black;text-align: center;font-size: 12pt;line-height: 2;">
                            Hi '.$name.',<br>
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
        else{
            //echo "nothing";
        }
    }
}

// Close database connection
$conn->close();
