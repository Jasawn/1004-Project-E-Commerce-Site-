<head>
    <title>Beforeshock | Register</title>
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

<section class="login py-5 border-top-1 mh-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>
                        <form action="process_register.php" method="post">
                            <fieldset class="p-4">
                                <input type="text" id="fname" class="border p-3 w-100 my-2"
                                       name="fname" placeholder="Enter first name" maxlength="45">
                                <input type="text" id="lname" class="border p-3 w-100 my-2"
                                       required name="lname" placeholder="Enter last name" required maxlength="45">
                                <input type="email" placeholder="Email*" class="border p-3 w-100 my-2" 
                                       id="email" name="email"  
                                       pattern="[a-zA-Z]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" required
                                       title="Email should not contain invalid characters (e.g. * / ~ +)">
                                <input type="password" placeholder="Password*" class="border p-3 w-100 my-2" 
                                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-~`]).{8,16}$" id="pwd" name="pwd" required >
                                <input type="password" placeholder="Confirm Password*" class="border p-3 w-100 my-2" 
                                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-~`]).{8,16}$" id="pwd_confirm" name="pwd_confirm"
                                       title="Ensure that you typed in the same password" required>
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <input type="checkbox" id="registering" class="mt-1">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                </div>
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Register Now</button>
                                <a class="mt-3 d-inline-block text-primary" href="login.php">Already a member? Log In</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include 'footer.inc.php';
    ?>

</body>