<?php
session_start();
?>
<html lang="en">
    <head>
        <title>Order Confirmation</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <link rel="stylesheet" href="css/main.css">

        <!--jQuery-->
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"    
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="    
                crossorigin="anonymous">
        </script>

        <!--IonIcons link-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!--Bootstrap JS--> 
        <script defer
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"    
                crossorigin="anonymous">
        </script>

        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!--Custom JS -->
        <script defer src="js/jquery.payform.min.js"></script>

        <?php
        require_once "divcreate.php";
        ?> 
    </head>

    <body>
        <?php
        include"nav.inc.php";
        ?>

        <main class="container mh-80">
            <?php
            $email = $errorMsg = "";
            $fname = $errorMsg = "";
            $lname = $errorMsg = "";
            $companyname = $errorMsg = "";
            $address = $errorMsg = "";
            $apt = $errorMsg = "";
            $postal = $errorMsg = "";
            $country = $errorMsg = "";
            $phonenum = $errorMsg = "";
            $cardname = $errorMsg = "";
            $cardnum = $errorMsg = "";
            $cvv = $errorMsg = "";
            $expiredates = $errorMsg = "";
            $success = true;
            $phonenumbcheck = "/^[8-9]{1}\d{1,8}$/";

            if (ctype_alpha($_POST["fname"])) {
                $fname = sanitize_input1($_POST["fname"]);
            } else {
                $errorMsg .= "Please enter characters only for Name.<br>";
                $success = false;
            }

            $companyname = sanitize_input1($_POST["companyname"]);
            $apt = sanitize_input1($_POST["apt"]);

            if (is_numeric($_POST["phonenum"]) && preg_match($phonenumbcheck, $_POST["phonenum"])) {
                $phonenum = sanitize_input1($_POST["phonenum"]);
            } else {
                if (!preg_match($phonenumbcheck, $_POST["phonenum"])) {
                    $errorMsg .= "Please enter valid Phone Number.<br>";
                    $success = false;
                } else {
                    $errorMsg .= "Please enter numbers only for Phone Number.<br>";
                    $success = false;
                }
            }


            if (empty($_POST["email"])) {
                $errorMsg .= "Email is required.<br>";
                $success = false;
            } else {
                $email = sanitize_input1($_POST["email"]);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorMsg .= "Invalid email format.<br>";
                    $success = false;
                }
            }

            if (empty($_POST["lname"])) {
                $errorMsg .= "Last Name is required.<br>";
                $success = false;
            } else {
                if (ctype_alpha($_POST["lname"])) {
                    $lname = sanitize_input1($_POST["lname"]);
                } else {
                    $errorMsg .= "Please enter characters only for Name.<br>";
                    $success = false;
                }
            }

            if (empty($_POST["address"])) {
                $errorMsg .= "Address is required.<br>";
                $success = false;
            } else {
                $address = sanitize_input1($_POST["address"]);
            }

            if (empty($_POST["postal"])) {
                $errorMsg .= "Postal Code is required.<br>";
                $success = false;
            } else {
                if (is_numeric($_POST["postal"])) {
                    $postal = sanitize_input1($_POST["postal"]);
                } else {
                    $errorMsg .= "Please enter numbers only for Postal Code.<br>";
                    $success = false;
                }
            }

            if (empty($_POST["country"])) {
                $errorMsg .= "Country is required.<br>";
                $success = false;
            } else {
                $country = sanitize_input1($_POST["country"]);
            }

            if (empty($_POST["cardname"])) {
                $errorMsg .= "Card Name is required.<br>";
                $success = false;
            } else {
                if (ctype_alpha($_POST["cardname"])) {
                    $cardname = sanitize_input1($_POST["cardname"]);
                } else {
                    $errorMsg .= "Please enter characters only for Card Name.<br>";
                    $success = false;
                }
            }

            if (empty($_POST["cardnum"])) {
                $errorMsg .= "Card Number is required.<br>";
                $success = false;
            } else {
                if (is_numeric($_POST["cardnum"])) {
                    $cardnum = sanitize_input1($_POST["cardnum"]);
                } else {
                    $errorMsg .= "Wrong Credit Card Number.<br>";
                    $success = false;
                }
            }

            if (empty($_POST["cvv"])) {
                $errorMsg .= "Card's CVV is required.<br>";
                $success = false;
            } else {
                if (is_numeric($_POST["cvv"])) {
                    $cvv = sanitize_input1($_POST["cvv"]);
                } else {
                    $errorMsg .= "Please enter numbers only for CVV.<br>";
                    $success = false;
                }
            }

            if (empty($_POST["expiredates"])) {
                $errorMsg .= "Card's Expiry Date is required.<br>";
                $success = false;
            } else {
                if (is_numeric($_POST["expiredates"])) {
                    $expireddates = sanitize_input1($_POST["expiredates"]);
                } else {
                    $errorMsg .= "Please enter numbers only for CC Expiry Date.<br>";
                    $success = false;
                }
            }

            if ($success) {
                date_default_timezone_set("Asia/Singapore");
            
                echo "<h1>Order #".rand(0,9999)." Successfully Placed at ".date("h:i:sa")."!</h1>";
                echo "<h2>Thank you for buying with us!" . $lname . ", " . $fname . " !.</h2>";
                ?>
                <a href="index.php"><button class ="backtohome">Back to home</button></a>
                <?php
            } else {
                ?>
                <script>
                    document.location.href = "orderpage.php";
                    alert("<?php echo strip_tags($errorMsg) ?>");
                </script>
                <?php
            }

            function sanitize_input1($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
        </main>
        
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>