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
                            
                            function sanitize_input($data) {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }
                            
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
                                    if(isset($_SESSION['ForumID'])){
                                        $forumID = $_SESSION['ForumID'];
                                    }else{
                                        $forumID = $_GET["title"];
                                        $_SESSION['ForumID'] = $forumID;
                                    }
                                    // Prepare the statement:        
                                    $stmt = $conn->prepare("SELECT forum.ForumID, forum.Content, forum.Date, forum.Title, forum.userID, forum.PicturesLink, project_members.fname, project_members.lname 
                                        FROM forum, project_members
                                        WHERE forum.userID = project_members.email AND ForumID = ?");
                                    // Bind & execute the query statement:
                                    $stmt->bind_param("i", $forumID);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $start = "<h3>{$row['Title']}</h3>
                                                <ul class='list-inline'>
                                                        <li class='list-inline-item'>by " . $row['fname'] . " " . $row['lname'] . "</li>
                                                        <li class='list-inline-item'>{$row['Date']}</li>
                                                </ul>";
                                            if(!empty($row['PicturesLink'])){
                                                $picture = "<div class='image'>
                                                                    <img src='{$row['PicturesLink']}' alt='article-01'>
                                                            </div>";
                                            }else{
                                                $picture = "";
                                            }
                                                
                                                $end = "<p class=''>{$row['Content']}</p>";
                                                
                                            if ($_SESSION["email"] == $row['userID']) {
                                                $updateB = "<a href='UpdatePost.php?title=$forumID' class='btn btn-transparent'>Update</a><p></p>";
                                                $deleteP = "<a href='DeletePost.php?title=$forumID' class='btn btn-transparent' onClick='return confirm('Are you sure you want to delete?')'>Delete</a>";
                                            }
                                            echo $start . $picture . $end . $updateB . $deleteP ;
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
                                    // Prepare the statement:        
                                    $stmt = $conn->prepare("SELECT project_members.fname, project_members.lname, comments.CommentID, comments.Content,comments.Date, comments.userID 
                                        FROM comments, project_members
                                        WHERE comments.userID = project_members.email AND MainForumID = ?");
                                    // Bind & execute the query statement:
                                    $stmt->bind_param("i", $forumID);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $start = "<div class='block comment'>
                                                <ul class='list-inline'>
                                                        <li class='list-inline-item'>By " . $row['fname'] . " " . $row['lname'] . "</li>
                                                        <li class='list-inline-item'>{$row['Date']}</li>
                                                </ul>
                                                <p class=''>{$row['Content']}</p>";
                                                if ($_SESSION["email"] == $row['userID']) {
                                                    $commentID = $row['CommentID'];
                                                    $updateC = "<a href='UpdateComment.php?comm=$commentID' class='btn btn-transparent'>Update</a><p></p>";
                                                    $deleteC = "<a href='DeletePost.php?comm=$commentID' class='btn btn-transparent' onclick='javascript:return confirm('Are You Confirm Deletion');'>Delete</a>";
                                                }
                                            $end = "</div>";
                                            echo $start . $updateC . $deleteC . $end;
                                        }
                                    }
                                    $stmt->close();
                                }
                                $conn->close();
                            }
                            ?>
<!--                        </div>-->
                        <div class="block comment">
                            <h4>Leave A Comment</h4>
                            <form action="NewComment.php" method="post" enctype="multipart/form-data">
                                <!-- Message -->
                                <div class="form-group mb-30">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message"rows="8"></textarea>
                                </div>
                                <button type="submit" class="btn btn-transparent">Leave Comment</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                        <div class="sidebar">
                            <?php include "cat.inc.php"; ?>
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

