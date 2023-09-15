<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="order-nav">
        <div class="page-name-nav">
            <div class="page-title">
                Referral - Venor Credit
            </div>
            <div class="cancel-btn-cont">
                <button class="cancel-btn"><a href="home">&times;</a></button>
            </div>
        </div>
    </nav>
    <div class="report-cont">
        <div class="report-info">
            <div class="report-headers">
                <?php
                function get_report_total(){
                    global $conn;
                    global $user_row;
                    $report_sql = "SELECT * FROM referral WHERE ref_code='$user_row[ref_code]'";
                    $report_result = mysqli_query($conn, $report_sql);
                    echo mysqli_num_rows($report_result);
                }
                ?>
                <div class="report-headers-info">
                    <h4>Venor Credit</h4>
                    <h3 class="total-amount-day">VC <?php echo $user_row['venorcredit'] ?></h3>
                    <p style="text-decoration:underline;cursor:pointer;">withdraw</p>
                </div>
                <div class="report-headers-info">
                    <h4>Total Referred</h4>
                    <h3 class="total-amount-day"><?php get_report_total() ?></h3>
                </div>
                <div class="report-headers-info">
                    <h4>Referral code</h4>
                    <h3 class="total-amount-day" id="ref_code"><?php echo $user_row['ref_code'] ?></h3>
                    <p><i class="fa fa-copy" id="ref_copy" style="cursor: pointer;"></i></p>
                </div>
            </div>
            <div class="report-info-cont">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead class="thead-light">
                            <tr>
                                <th>S/N</th>
                                <th>NAME</th>
                                <th>PLAN</th>
                                <th>CREDIT EARNED</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $report_result = mysqli_query($conn, "SELECT * FROM referral WHERE ref_code='$user_row[ref_code]'");
                            if(mysqli_num_rows($report_result) > 0){
                                while($report_row = mysqli_fetch_assoc($report_result)){
                                    $count++;
                                    $invite_id = $report_row['userid'];
                                    $invite_result = mysqli_query($conn, "SELECT * FROM users WHERE userid='$invite_id'");
                                    $invite_row = mysqli_fetch_assoc($invite_result);
                                    if($invite_row['plan'] == 'starter'){
                                        $plan_price = "2 - NGN 2,000";
                                    }
                                    elseif($invite_row['plan'] == 'professional'){
                                        $plan_price = "5 - NGN 5,000";
                                    }
                                    elseif($invite_row['plan'] == 'advanced'){
                                        $plan_price = "10 - NGN 10,000";
                                    }
                                    else{
                                        $plan_price = 'Error';
                                    }


                                    # For status
                                    
                                    if($invite_row['status'] == 'unpaid'){
                                        $plan_status = "Pending";
                                    }
                                    elseif($invite_row['status'] == 'paid'){
                                        $plan_status = "Completed";
                                    }
                                    else{
                                        $plan_status = 'Error';
                                    }
                                    echo "
                                        <tr>
                                            <td>$count</td>
                                            <td>$invite_row[name]</td>
                                            <td>$invite_row[plan]</td>
                                            <td>$plan_price</td>
                                            <td>$plan_status</td>
                                        </tr>
                                        ";
                                }
                            }
                            else{
                                echo "
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>NO REFERRAL YET</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
<?php
include("../stores/notify.html");
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
        document.getElementById("productmessage").innerText = "Referral code copied"
        showNotification()
        setTimeout(closenotification,1000)
    });
</script>
</html>