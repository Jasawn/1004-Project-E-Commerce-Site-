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
				<h3>Post Deleted</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!--==================================
=            Blog Section            =
===================================-->

<section class="blog section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-12 offset-lg-0">
                <?php
                function DeleteForumFromDB() {
                    global $errorMsg, $success, $forumID;
                    
                    $forumID = $_GET["title"];

                    // Create database connection:
                    $config = parse_ini_file('../../private/db-config.ini');
                    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

                    // Check connection
                    if ($conn->connect_error) {
                        $errorMsg = "Connection failed: " . $conn->connect_error;
                        console . log($errorMsg);
                        $success = false;
                    } else {   // Prepare the statement:
                        $stmt = $conn->prepare("DELETE FROM forum WHERE ForumID=?");
                        echo "<script>console.log('connection test 2');</script>";
                        // echo "<p>" . $forumIDU . "</p>";
                        // Bind & execute the query statement:
                        $stmt->bind_param("i", $forumID);

                        if (!$stmt->execute()) {
                            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                            echo "<p>".$errorMsg."</p>";
                            $success = false;
                        }
                        echo "<script>console.log('connection test 3');</script>";
                        $stmt->close();
                    }
                    $conn->close();
                    
                    echo "<section class='blog section'>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-md-10 offset-md-1 col-lg-12 offset-lg-0 text-center'>
                                        <h3>Click to return to Main page</h3>
                                        <a href='Forum.php' class='btn btn-transparent text-center'>Back to Forum</a>
                                    </div>
                                </div>
                            </div>
                        </section>";
                }
                
                function DeleteCommentFromDB() {
                    global $errorMsg, $success, $commentID;
                    
                    $commentID = $_GET["comm"];
                    $forumID = $_SESSION['ForumID'];

                    // Create database connection:
                    $config = parse_ini_file('../../private/db-config.ini');
                    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

                    // Check connection
                    if ($conn->connect_error) {
                        $errorMsg = "Connection failed: " . $conn->connect_error;
                        echo "<p>" . $errorMsg . "</p>";
                        $success = false;
                    } else {   // Prepare the statement:
                        $stmt = $conn->prepare("DELETE FROM comments WHERE CommentID=?");
                        echo "<script>console.log('connection test 2');</script>";
                        // echo "<p>" . $forumIDU . "</p>";
                        // Bind & execute the query statement:
                        $stmt->bind_param("i",$commentID);

                        if (!$stmt->execute()) {
                            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                            echo "<p>".$errorMsg."</p>";
                            $success = false;
                        }
                        echo "<script>console.log('connection test 3');</script>";
                        $stmt->close();
                    }
                    $conn->close();
                    
                    echo "<section class='blog section'>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-md-10 offset-md-1 col-lg-12 offset-lg-0 text-center'>
                                        <h3>Click to return to Main Post</h3>
                                        <a href='Single_forum.php?title=$forumID' class='btn btn-transparent text-center'>Back to Post</a>
                                    </div>
                                </div>
                            </div>
                        </section>";
                }
                
                if(isset($_GET["comm"])){
                    DeleteCommentFromDB();
                }else if(isset($_GET["title"])){
                    DeleteForumFromDB();
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!--============================
=            Footer            =
=============================-->

<?php include "footer.inc.php"; ?>

</body>

</html>