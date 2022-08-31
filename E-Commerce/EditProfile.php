<!DOCTYPE html>
<?php
session_start();
include 'process_profile.php';
if (!isset($_SESSION["email"])) {
    header("location: index.php");
}
$email = $_SESSION['email'];
$userInfo = getAndDisplayProfileInfo($email);

$fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullURL, "edit=success") == true) {
    echo "<p class='success'>Update successful!</p>";
} elseif (strpos($fullURL, "edit=error1") == true) {
    echo "<p class='error'>Last Name is required!</p>";
} elseif (strpos($fullURL, "edit=error2") == true) {
    echo "<p class='error'>Current passsword, New Password and confirm password are required!</p>";
} elseif (strpos($fullURL, "edit=error3") == true) {
    echo "<p class='error'>Password do not match!</p>";
} elseif (strpos($fullURL, "edit=error4") == true) {
    echo "<p class='error'>Current password is incorrect!</p>";
} elseif (strpos($fullURL, "edit=error5") == true) {
    echo "<p class='error'>Password is required!</p>";
} elseif (strpos($fullURL, "edit=error6") == true) {
    echo "<p class='error'>Password is incorrect!</p>";
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/Profile.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                                    <div class="image d-flex justify-content-center" id="profileImageDiv">
                                        <img src="<?php echo $userInfo[6] ?>" alt="ProfileImage" class="" id='ProfileImage'> <!--$profileImg-->
                                    </div>
                                    <!-- User Name -->
                                    <div style="text-align: center">
                                        <!--</form>-->
                                        <br>
                                        <button class="btn btn-primary" id="randomisePicture">Randomise</button>
                                        <button class="btn btn-primary saveProfileImage" id="saveProfileImage" onclick="updateImage()">Save Image</button>

                                    </div>
                                </div>
                                <!-- Dashboard Links -->
                                <div style="padding-bottom: 30px">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#terminateModal" style="background-color:red">
                                        Terminate Account
                                    </button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#backModal" style="float: right">
                                        Back
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="widget welcome-message">
                                <h1>Your Profile</h1>
                                <form action="process_profile.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="bio" value="<?php echo $userInfo[5] ?>"
                                               name="bio" placeholder="Bio"> 
                                    </div>
                                    <p><i>Maximum 255 characters</i></p>
                                    <button class="btn btn-primary"  name="editBio">Update Bio</button>
                                </form>
                            </div>
                            <!-- Edit Personal Info -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="widget personal-info">
                                        <h2 class="widget-header user">Edit Personal Information</h2>
                                        <form action="process_profile.php" method="post">
                                            <!-- First Name -->
                                            <div class="form-group">
                                                <label for="first-name">First Name</label>
                                                <input type="text" class="form-control" id="first-name" value="<?php echo $userInfo[0] ?>"
                                                       name="fName" placeholder="First Name"> 
                                            </div>
                                            <!-- Last Name -->
                                            <div class="form-group">
                                                <label for="last-name">Last Name</label>
                                                <input type="text" class="form-control" id="last-name" value="<?php echo $userInfo[1] ?>"
                                                       name="lName" placeholder="Last Name"> 
                                            </div>
                                            <!-- Submit button -->
                                            <button class="btn btn-primary" name="editName">Save My Changes</button>
                                        </form>
                                    </div>                                                          
                                    <div class="widget change-password">
                                        <h3 class="widget-header user">Edit Address</h3>
                                        <form action="process_profile.php" method="post">
                                            <!-- Current Password -->
                                            <div class="form-group">
                                                <label for="userProfileAddress">Address</label>
                                                <textarea class="form-control" id="userProfileAddress"
                                                          name="userProfileAddress" placeholder="Address" ><?php echo $userInfo[4] ?> </textarea>
                                            </div>
                                            <!-- Submit Button -->
                                            <button class="btn btn-primary" name="changeUserAddress">Update Address</button>
                                        </form>
                                    </div> 
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <!-- Change Password -->
                                    <div class="widget change-password">
                                        <h3 class="widget-header user">Edit Password</h3>

                                        <form action="process_profile.php" method="post">
                                            <!-- Current Password -->
                                            <div class="form-group">
                                                <label for="current-password">Current Password</label>
                                                <input type="password" class="form-control" id="current-password"
                                                       name="currentPassword" required placeholder="Current Password">
                                            </div>
                                            <!-- New Password -->
                                            <div class="form-group">
                                                <label for="new-password">New Password</label>
                                                <input type="password" class="form-control" id="new-password"
                                                       name="newPassword" required placeholder="New Password"
                                                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-~`]).{8,16}$">
                                            </div>
                                            <!-- Confirm New Password -->
                                            <div class="form-group">
                                                <label for="confirm-password">Confirm New Password</label>
                                                <input type="password" class="form-control" id="confirm-password"
                                                       name="confirmPassword" required placeholder="Confirm Password"
                                                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-~`]).{8,16}$">
                                            </div>
                                            <!-- Submit Button -->
                                            <button class="btn btn-primary" name="changePassword">Update Password</button>
                                        </form>
                                        <br>
                                        <ul style="list-style-type: circle; font-style: italic">
                                            <li>At least 1 uppercase character(A-Z)</li>
                                            <li>At least 1 lowercase character (a-z)</li>
                                            <li>At least 1 digit (0-9)</li>
                                            <li>At least 1 special character</li>
                                            <li>10-16 character</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!-- Modal -->
                                    <div class="modal fade" id="backModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Back to profile Page</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to go back? <br>
                                                    Any changes not saved will be discarded.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="profile.php">
                                                        <input type="submit" class="btn btn-primary" value="Go back"/>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="terminateModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="color: red">Terminate Account</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Deleting your account is permanent and cannot be undone. Please do so carefully.</p>
                                                    <p>For security reasons, please provide your password: </p>
                                                    <form action="process_profile.php" method="POST">
                                                        <div class="form-group">
                                                            <label for="terminatePassword">Password:</label>
                                                            <input type="password" class="form-control" id="terminatePassword"
                                                                   name="terminatePassword" required>
                                                        </div>
                                                        <button class="btn btn-primary" name="terminateAccount" style="float:left">Terminate Account</button>
                                                    </form>
                                                    <div class="form-group" style="float: right">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <p style="color:red">Warning: this cannot be undone.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

