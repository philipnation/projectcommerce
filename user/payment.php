<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>pay now</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet" href="https://kadempharmacy.com/css/payer.css">
        <style>
            a{
                text-decoration: none !important;
            }
        </style>
    </head>
    <body>
        <div class="container bg-light d-md-flex align-items-center">
            <div class="card box1 shadow-sm p-md-5 p-md-5 p-4" style="background-color:rgb(13, 14, 82);height:auto;">
                <div class="d-flex flex-column">
                    <div class="border-bottom mb-4"></div>
                    <div class="d-flex flex-column mb-4">
                        <span class="far fa-file-alt text">
                            <span class="ps-2">payment ID:</span>
                        </span>
                        <span class="ps-3"><?php echo rand(1000000,999999999) ?></span>
                    </div>
                    <div class="d-flex flex-column mb-5">
                        <span class="far fa-calendar-alt text">
                            <span class="ps-2">Date:</span>
                        </span>
                        <span class="ps-3"><?php echo date("d M Y") ?></span>
                    </div>
                </div>
            </div>
            <div class="card box2 shadow-sm">
                <div class="d-flex align-items-center justify-content-between p-md-5 p-4">
                    <span class="small">subscribe to keep your store active</span>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-column px-md-5 px-4 mb-4">
                                <span>Buiness name</span>
                                <div class="inputWithIcon">
                                    <input class="form-control" type="text" id="first-name" style="background-color:transparent;" value="<?php echo $user_row['business_name'] ?>" readonly>
                                </div>
                            </div>
                            <div class="d-flex flex-column px-md-5 px-4 mb-4">
                                <span>Email</span>
                                <div class="inputWithIcon">
                                    <input class="form-control" type="text" id="email-address" style="background-color:transparent;"  value="<?php echo $user_row['email'] ?>" readonly>
                                </div>
                            </div>
                            <div class="d-flex flex-column px-md-5 px-4 mb-4">
                                <span>plan</span>
                                <div class="inputWithIcon">
                                    <input class="form-control" type="text" style="background-color:transparent;"  value="<?php echo $user_row['plan'] ?>" readonly>
                                    <input class="form-control" type="text" id="amount" style="background-color:transparent;"  value="<?php
                                        if($user_row['plan'] == "starter"){
                                            echo 5000;
                                        }
                                        elseif($user_row['plan'] == "professional"){
                                            echo 15000;
                                        }
                                        elseif($user_row['plan'] == "advanced"){
                                            echo 35000;
                                        }
                                        else{
                                            echo "Error";
                                        }
                                        ?>" readonly hidden
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-md-5 px-4 mt-3">
                            <div class="btn btn-primary w-100" onclick="SquadPay()" style="background-color:rgb(13, 14, 82);">Pay NGN <?php
                                if($user_row['plan'] == "starter"){
                                    echo '5,000';
                                }
                                elseif($user_row['plan'] == "professional"){
                                    echo '15,000';
                                }
                                elseif($user_row['plan'] == "advanced"){
                                    echo '35,000';
                                }
                                else{
                                    echo "Error";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-12 px-md-5 px-4 mt-3">
                            <p style="text-align: center;">OR PAY WITH VENOR CREDIT</p>
                            <div class="btn btn-primary w-100" onclick="SquadPay()" style="background-color:rgb(13, 14, 82);">Pay VC <?php
                            if($user_row['plan'] == "starter"){
                                echo 5;
                            }
                            elseif($user_row['plan'] == "professional"){
                                echo 15;
                            }
                            elseif($user_row['plan'] == "advanced"){
                                echo 35;
                            }
                            else{
                                echo "Error";
                            }
                            ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://checkout.squadco.com/widget/squad.min.js"></script> 
        <script>
            function SquadPay() {
            
            const squadInstance = new squad({
                onClose: () => console.log("Widget closed"),
                onLoad: () => console.log("Widget loaded successfully"),
                onSuccess: (response) => {
                    console.log("Payment successful");
                    console.log(response); // Log the response object
                    // Process the response as needed (e.g., decode JSON, check payment status)
                },
                key: "sandbox_pk_6b7a8e2958a8f42c9746cd5059cc75715b891c818011",
                //sandbox_pk_6b7a8e2958a8f42c9746cd5059cc75715b891c818011
                //pk_a29a0e76cd8113a2f58bc7de96be596b5110b9db
                //sk_a29a0e76cd8113a29597a4d6efd5596c5609b0a4
                //Change key (test_pk_sample-public-key-1) to the key on your Squad Dashboard
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                //Enter amount in Naira or Dollar (Base value Kobo/cent already multiplied by 100)
                currency_code: "NGN"
            });
            squadInstance.setup();
            squadInstance.open();
            }
        </script>
</html>