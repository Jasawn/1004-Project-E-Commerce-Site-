<!DOCTYPE html>
<?php
session_start();
include 'process_profile.php';
if (!isset($_SESSION["email"])) {
    header("location: index.php");
}
$email = $_SESSION['email'];
$userInfo = getAndDisplayProfileInfo($email);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/Profile.css">
        <!--jQuery-->
        <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="js/profile.js"></script>

        <title>Profile Page</title>

        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php
        include 'nav.inc.php';
        ?>
        <main>
            <section class="user-profile section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sidebar">
                                <!-- User Widget -->
                                <div class="widget user">
                                    <!-- User Image -->
                                    <div class="image d-flex justify-content-center">
                                        <img src="<?php echo $userInfo[6] ?>" alt="ProfileImage" class=""> 
                                    </div>
                                    <!-- User Name -->
                                    <h5 class="text-center"><?php echo $userInfo[0] . " " . $userInfo[1] ?></h5>
                                    <br>
                                    <h6><?php echo $userInfo[5] ?></h6> <!--$bio -->
                                </div>
                                <!-- Dashboard Links -->
                                <!--                                <div class="widget user-dashboard-menu">
                                                                    <ul>
                                                                        <li id="profile-dashboard"><a href="index.php">My orders</a></li>
                                                                    </ul>
                                                                </div>-->
                            </div>
                        </div>
                        <div class="col-lg-8">

                            <div class="widget">
                                <h1>More about <?php echo $userInfo[0] . " " . $userInfo[1] ?></h1> <br>
                                <p class="privateInfo"><b>Email: </b> <br> <?php echo $userInfo[2] ?></p>
                                <p class="privateInfo"><b>Address: </b> <br> <?php echo $userInfo[4] ?></p>
                            </div>
                            <!-- Edit Personal Info -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6">

                                </div>
                                <div class="col-lg-6 col-md-6">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!-- Button trigger modal -->
                                    <form action="EditProfile.php">
                                        <input type="submit" class="btn btn-primary" value="Edit Profile"/>
                                    </form>
                                </div>
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

