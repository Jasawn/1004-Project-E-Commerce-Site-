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
				<h3>Update Post</h3>
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
                        $forumID = $_GET["title"];
                        $_SESSION['ForumID'] = $forumID;
                        // Prepare the statement:        
                        $stmt = $conn->prepare("SELECT * FROM forum WHERE ForumID=?");
                        // Bind & execute the query statement:
                        $stmt->bind_param("i", $forumID);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $middle = "";
                                $start = "<form action='ProcessUpdatePost.php' method='post' enctype='multipart/form-data'>
                                                <fieldset class='p-4'>
                                                    <div class='form-group'>
                                                        <div class='row'>
                                                            <div class='col-lg-12'>
                                                                <input type='text' id='title' name='title' class='form-control' value='{$row['Title']}' required>
                                                            </div>
                                                        </div>
                                                    </div>";
                                switch ($row['Category']) {
                                    case "1":
                                        $middle = "<input type='text' id='category' name='category'  class='form-control' value='Reviews on New tech' disabled>";
                                        break;
                                    case "2":
                                        $middle = "<input type='text' id='category' name='category'  class='form-control' value='General (Trouble Shooting)' disabled>";
                                        break;
                                    case "3":
                                        $middle = "<input type='text' id='category' name='category'  class='form-control' value='Hardware (Trouble Shooting)' disabled>";
                                        break;
                                    case "4":
                                        $middle = "<input type='text' id='category' name='category'  class='form-control' value='Software (Trouble Shooting)' disabled>";
                                        break;
                                }
                                $end = "<textarea name='content' id='content'  placeholder='Content *' class='border w-100 p-3 mt-3 mt-lg-4'>{$row['Content']}</textarea>
                                                <div class='btn-grounp'>
                                                    <button type='submit' class='btn btn-primary mt-2 float-right'>SUBMIT</button>
                                                </div>
                                            </fieldset>
                                        </form>";


                                echo $start . $middle . $end;
                            }
                        }
                        $stmt->close();
                    }
                    $conn->close();
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