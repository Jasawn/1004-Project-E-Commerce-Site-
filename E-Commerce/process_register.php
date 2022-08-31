<?php
$fname = $lname = $email = $pwd_hashed = $errorMsg = "";
$success = true;
include 'divcreate.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (!empty($_POST["fname"]))
    {
        $fname = sanitize_input($_POST["fname"]);
    }
    if (empty($_POST["lname"]))
    {
        $errorMSG .="Last name is required.<br>";
        $success = false;
    }
    else
    {
        $lname = sanitize_input($_POST["lname"]);
    }
    
    if (empty($_POST["email"]))
    {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    }
    else
    {
        $email = sanitize_input($_POST["email"]);
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errorMsg .="Invalid email format.<br>";
            $success = false;
        }
    }
    
    if (empty($_POST["pwd"]) || empty($_POST["pwd_confirm"]))
    {
        $errorMsg .= "Password and confirmation are required.<br>";
        $success = false;
    }
    else
    {
        if ($_POST["pwd"] != $_POST["pwd_confirm"])
        {
            $errorMsg .= "Passwords do not match.<br>";
            $success = false;
        }
        else
        {
            $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        }
    }   
   if ($success == true) {
        saveMemberToDB();
    }
    
}
else
{
    echo "<h2>This page is not meant to be run directly.</h2>";
    echo "<p>You can register at the link below:</p>";
    echo "<a href='register.php'>Go to Sign Up page...</a>";
    exit();
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
        
        <?php
        include 'nav.inc.php';
        ?>
        
        <main class="container">
            <hr>
            <?php
            if ($success)
            {
                echo "<h2>Your registration is successful!</h2>";
                echo "<h4>Thank you for signing up, ". $fname . " " . $lname . !".</h4>";
                echo "<a href='login.php' class='btn btn-success'>Log-in</a>";
            }
            else 
            { 
                echo "<h2>Oops!</h2>";
                echo "<h4>The following errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<a href='register.php' class='btn btn-danger'>Return to Sign Up</a>";
            }
            ?>
        </main>
        <br>
    </body>
