<?php
session_start();
?>
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
                        <h3>Blog Page</h3>
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
                    <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                        <?php
                        unset($_SESSION['ForumID']);
                        unset($_SESSION['commentid']);
                        getPosts();

                        function getPosts() {
                            // Create database connection.
                            $config = parse_ini_file('../../private/db-config.ini');
                            $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
                            // Check connection
                            if ($conn->connect_error) {
                                $errorMsg = "Connection failed: " . $conn->connect_error;
                                $success = false;
                            } else {
                                // Prepare the statement:        
                                $stmt = $conn->prepare("SELECT forum.ForumID, forum.Content, forum.Date, forum.Title, forum.PicturesLink, project_members.fname, project_members.lname FROM forum, project_members WHERE forum.userID = project_members.email;");
                                // Bind & execute the query statement:
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $forumID = $row['ForumID'];
                                        $start = "<article>";
                                        if (!empty($row['PicturesLink'])) {
                                            $picture = "<div class='image'>
                                                        <img src='{$row['PicturesLink']}' alt='article-01'>
                                                </div>";
                                        } else {
                                            $picture = "";
                                        }
                                        $middle = "<h3>{$row['Title']}</h3>
                                                <ul class='list-inline'>
                                                        <li class='list-inline-item'>by <a>" . $row['fname'] . " " . $row['lname'] . "</a></li>
                                                        <li class='list-inline-item'>{$row['Date']}</li>
                                                </ul>
                                                <p class=''>{$row['Content']}</p>

                                                <a href='Single_forum.php?title=$forumID' class='btn btn-transparent'>Read More</a><br>
                                                </article>";

                                        echo $start . $picture . $middle;
                                    }
                                }
                                $stmt->close();
                            }
                            $conn->close();
                        }
                        ?>

                    </div>
                    <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                        <div class="sidebar">
                        <?php
                        if ($_SESSION["email"] != "") {

                            echo "<input type='button' id='NewForum' class='btn btn-transparent' value='Create New Post'>";
                            echo "<p>" . "</p>";
                        }
                        ?>

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

        <script type="text/javascript">
                    document.getElementById("NewForum").onclick = function () {
                        location.href = "NewForum.php";
                    };
        </script>
    </body>
</html>

