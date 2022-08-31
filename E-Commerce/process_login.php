<?php
$email = $pwd_hashed = $errorMsg = "";
$success = true;
include 'divcreate.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//email
    if (empty($_POST["email"])) {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg .= "Invalid email format.<br>";
            $success = false;
        }
    }

//pass
    if (empty($_POST["pwd"])) {
        $errorMsg .= "Password and confirmation are required.<br>";
        $success = false;
    } 
 
    //Validation and sanitization is successful , run savemember to post to DB
    if ($success == true) {
        authenticateUser();
        }
    }


?>

<html>
    <head>
        <title>Beforeshock | Login</title>
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

        <!--Bootstrap JS--> 
        <script defer
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"    
                crossorigin="anonymous">
        </script>

        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

        <!--Custom JS -->
        <script defer src="js/main.js"></script>
    </head>
    <body class="body-wrapper">
        
        <main class="container">
            <hr>
            <?php
            if ($success)
            {
                session_start();
                $_SESSION['email'] = $email;
                echo "<h2>Your login is successful!</h2>";
                echo "<h4>Welcome back, ". $fname . " " . $lname . !".</h4>";
                echo "<p></p>";
                echo "<a href='index.php' class='btn btn-success'>Return to home</a>";
            }
            else
            { 
                echo "<h2>Oops!</h2>";
                echo "<h4>The following errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a href='login.php' class='btn btn-danger'>Return to Login</a>";
            }
            ?>
        </main>
        <br>
    </body>