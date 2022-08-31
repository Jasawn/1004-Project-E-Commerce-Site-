<!DOCTYPE html>
<?php
session_start();
session_unset();
session_destroy();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/AboutUs.css">
        <!--jQuery-->
        <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <title>Account Termination</title>

        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php
        include 'nav.inc.php';
        ?>
        <main>
            <section class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 text-center">
                            <h1>Account Terminated</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section scroll-container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 scroll-element js-scroll">
                            <div class="about-img">
                                <img src="images/brett-jordan-LYlX4YYVAh0-unsplash.jpg" class="img-fluid w-100 rounded" alt=""> 
                                Photo by <a href="https://unsplash.com/@brett_jordan?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Brett Jordan</a> on <a href="https://unsplash.com/s/photos/miss-you?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

                            </div>
                        </div>
                        <div class="col-lg-6 pt-5 pt-lg-0">
                            <div class="about-content">
                                <h2 class="font-weight-bold">We are sorry to see you go</h2>
                                <br>
                                <h3>We'll just be here, hoping absence really does make the heart grow fonder.</h3>                           
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php
        include 'footer.inc.php';
        ?>
    </body>
</html>

