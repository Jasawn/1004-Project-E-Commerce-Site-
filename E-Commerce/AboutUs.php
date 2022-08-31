<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/AboutUs.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>About Us</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php
        include 'nav.inc.php';
        ?>
        <main>
            <div class="hero-image section">
                <div class="hero-text">
                    <h1 style="font-size:50px">About "BEFORESHOCK"</h1>
                </div>
            </div>
            <section class="section scroll-container">
                <div class="container">
                    <div class="row" style="padding-bottom: 30px;">
                        <div class="col-lg-6 scroll-element js-scroll">
                            <div class="about-img">
                                <img src="images/jessica-lam-wUuo7WfoKS4-unsplash.jpg" class="img-fluid w-100 rounded" alt=""> 
                                Photo by <a href="https://unsplash.com/@lovelle?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Jessica Lam</a> on <a href="https://unsplash.com/s/photos/monitor?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>

                            </div>
                        </div>
                        <div class="col-lg-6 pt-5 pt-lg-0">
                            <div class="about-content">
                                <h2 class="font-weight-bold">Who are we</h2>
                                <p style="font-size: 25px">Founded in 2015, our mission is to empower every person on the planet the resources required to achieve more. 
                                    Every device goes through the assembly line, carefully handpicked, assembled and tested by a team of hardware enthisiasts 
                                    to ensure upmost quality assurance.</p>                           
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 pt-5 pt-lg-0">
                            <div class="about-content">
                                <h2 class="font-weight-bold">Dedicated Service</h2>
                                <p style="font-size: 25px">At BEFORESHOCK, we dedicate our efforts to ensure the best customer service possible. All devices comes
                                    with their own respective warranty coverage. During the warranty period, any failed components can easily 
                                    be exchanged quickly to minimize downtime. Our service crew works tirelessly around the clock to ensure all customers are happy.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="images/alesia-kazantceva-VWcPlbHglYc-unsplash.jpg" class="img-fluid w-100 rounded" alt=""> 
                                Photo by <a href="https://unsplash.com/@saltnstreets?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Alesia Kazantceva</a> on <a href="https://unsplash.com/s/photos/help-desk?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
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
