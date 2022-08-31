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
        <!--=================================
        =            Single Blog            =
        ==================================-->


        <section class="blog single-blog section">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                        <article class="single-post">
                            <?php
                            
                            getSinglePosts();

                            function getSinglePosts() {
                                // Create database connection.
                                $config = parse_ini_file('../../private/db-config.ini');
                                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
                                // Check connection
                                if ($conn->connect_error) {
                                    $errorMsg = "Connection failed: " . $conn->connect_error;
                                    $success = false;
                                } else {
                                    $forumID = $_SESSION['ForumID'];
                                    // Prepare the statement:        
                                    $stmt = $conn->prepare("SELECT * FROM forum WHERE ForumID=?");
                                    // Bind & execute the query statement:
                                    $stmt->bind_param("i", $forumID);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $start = "<h3>{$row['Title']}</h3>
                                                <ul class='list-inline'>
                                                        <li class='list-inline-item'>by {$row['userID']}</li>
                                                        <li class='list-inline-item'>{$row['Date']}</li>
                                                </ul>
                                                <div class='image'>
                                                        <img src='{$row['PicturesLink']}' alt='article-01'>
                                                </div>
                                                <p class=''>{$row['Content']}</p>";
                                            echo $start;
                                        }
                                    }
                                    $stmt->close();
                                }
                                $conn->close();
                            }
                            ?>
                        </article>
<!--                        <div class='block comment'>-->
                            <?php
                            getComments();
                            
                            function getComments() {
                                // Create database connection.
                                $config = parse_ini_file('../../private/db-config.ini');
                                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
                                // Check connection
                                if ($conn->connect_error) {
                                    $errorMsg = "Connection failed: " . $conn->connect_error;
                                    $success = false;
                                } else {
                                    $forumID = $_SESSION['ForumID'];
                                    $commentID = $_GET["comm"];
                                    // Prepare the statement:        
                                    $stmt = $conn->prepare("SELECT * FROM comments WHERE MainForumID=?");
                                    // Bind & execute the query statement:
                                    $stmt->bind_param("i", $forumID);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['CommentID'] == $commentID){
                                                $_SESSION['commentid'] = $commentID;
                                                $start = "<div class='block comment'>
                                                    <ul class='list-inline'>
                                                            <li class='list-inline-item'>By {$row['userID']}</li>
                                                            <li class='list-inline-item'>{$row['Date']}</li>
                                                    </ul>
                                                    <form action='ProcessUpdateComment.php' method='post' enctype='multipart/form-data'>
                                                        <div class='form-group mb-30'>
                                                            <label for='message'>Message</label>
                                                            <textarea class='form-control' id='message' name='message' rows='8'>{$row['Content']}</textarea>
                                                        </div>
                                                        <button type='submit' class='btn btn-transparent'>Update Comment</button>
                                                    </form>";
                                                $end = "</div>";
                                                echo $start . $end;
                                            }else{
                                                $start = "<div class='block comment'>
                                                    <ul class='list-inline'>
                                                            <li class='list-inline-item'>By {$row['userID']}</li>
                                                            <li class='list-inline-item'>{$row['Date']}</li>
                                                    </ul>
                                                    <p class=''>{$row['Content']}</p>";
                                                $end = "</div>";
                                                echo $start . $end;
                                            }
                                        }
                                    }
                                    $stmt->close();
                                }
                                $conn->close();
                            }
                            ?>
                        <!-- <div class="block comment">
                            <h4>Leave A Comment</h4>
                            <form action="NewComment.php" method="post" enctype="multipart/form-data">
                                Message
                                <div class="form-group mb-30">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message"rows="8"></textarea>
                                </div>
                                <button type="submit" class="btn btn-transparent">Leave Comment</button>
                            </form>
                        </div> -->
                    </div>
                    <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                        <div class="sidebar">
                            <!-- Category Widget -->
                            <div class="widget category">
                                <!-- Widget Header -->
                                <h5 class="widget-header">Categories</h5>
                                <ul class="category-list">
                            <li><a href="">Reviews on New Tech</a></li>
                            <li><a href="">General (Troubleshooting)</a></li>
                            <li><a href="">Hardware (Troubleshooting)</a></li>
                            <li><a href="">Software (Troubleshooting)</a></li>
                        </ul>
                            </div>
                        </div>
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

