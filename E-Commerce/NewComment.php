<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BeforeShock</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
  <link href="css/style1.css" rel="stylesheet">
  
  
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
  
</head>


<body class="body-wrapper">


<?php
include "nav.inc.php";
?>
    <!--================================
    =            Page Title            =
    =================================-->
    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>Upload Successful</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <?php

    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function saveCommentToDB() {
        global $content, $email, $date, $errorMsg, $success, $forumID;
        $forumID = $_SESSION["ForumID"];
        $email = $_SESSION["email"];
        $date = date("Y/m/d h:i:sa");
        $content = sanitize_input($_POST['message']);

        // Create database connection:
        $config = parse_ini_file('../../private/db-config.ini');
        $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

        // Check connection
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
            console . log($errorMsg);
            $success = false;
        } else {   // Prepare the statement:
            $stmt = $conn->prepare("INSERT INTO comments (userID, Content, Date, MainForumID) VALUES (?, ?, ?, ?)");
            echo "<script>console.log('connection test 2');</script>";
            // Bind & execute the query statement:
            $stmt->bind_param("sssi", $email, $content, $date, $forumID);

            if (!$stmt->execute()) {
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                echo "<p>".$errorMsg."</p>";
                $success = false;
            }
            echo "<script>console.log('connection test 3');</script>";
            $stmt->close();
        }
        $conn->close();
    }
    
    if(isset($_SESSION["email"])){
        saveCommentToDB();
        
        echo"<section class='blog section'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-10 offset-md-1 col-lg-12 offset-lg-0 text-center'>
                            <h3>Return to Main Post</h3>
                            <a href='Single_forum.php?title=$forumID' class='btn btn-transparent text-center'>Main Post</a>
                        </div>
                    </div>
                </div>
            </section>";
    }else{
        echo"<section class='blog section'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-10 offset-md-1 col-lg-12 offset-lg-0 text-center'>
                            <h3>You need an account to leave a comment</h3>
                            <a href='Single_forum.php?title=$forumID' class='btn btn-transparent text-center'>Main Post</a>
                        </div>
                    </div>
                </div>
            </section>";
    }

    ?>

    <?php include "footer.inc.php"; ?>

</body>
</html>