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

<section class="login py-5 border-top-1 mh-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login Now</h3>
                    <form action="process_login.php" method="post">
                        <fieldset class="p-4">
                            <input class="border p-3 w-100 my-2" type="email" placeholder="Email" id="email" name="email"
                                   pattern="[a-zA-Z]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" required
                                   title="Email should not contain invalid characters (e.g. * / ~ +)">
                            <input type="password" placeholder="Password" class="border p-3 w-100 my-2" id="pwd"
                                   name="pwd" required>
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Log in</button>
                            <a class="mt-3 d-inline-block text-primary" href="register.php">Register Now</a>
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

