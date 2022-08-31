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

function saveForumToDB() {
    global $title, $content, $email, $category, $date, $target_file, $errorMsg, $success;

    // Create database connection:
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        console . log($errorMsg);
        $success = false;
    } else {   // Prepare the statement:
        $stmt = $conn->prepare("INSERT INTO forum (userID, Title, Content, Category, Date, PicturesLink) VALUES (?, ?, ?, ?, ?, ?)");
        echo "<script>console.log('connection test 2');</script>";
        // Bind & execute the query statement:
        $stmt->bind_param("sssiss", $email, $title, $content, $category, $date, $target_file);

//        echo "<p>" . $email . "</p>";
//        echo "<p>" . $title . "</p>";
//        echo "<p>" . $content . "</p>";
//        echo "<p>" . $category . "</p>";
//        echo "<p>" . $date . "</p>";
//        echo "<p>" . $target_file . "</p>";

        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            // echo "<p>".$errorMsg."</p>";
            $success = false;
        }
        echo "<script>console.log('connection test 3');</script>";
        $stmt->close();
    }
    $conn->close();
}

if (!empty($_POST["title"])) {
    $title = sanitize_input($_POST["title"]);
    $content = sanitize_input($_POST["content"]);
    $category = $_POST['category'];
    $email = $_SESSION["email"];
    $date = date("Y/m/d h:i:sa");
} else {
    echo "everything empty";
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(basename($_FILES["fileToUpload"]["name"]) != ""){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}else{
    $target_file = "";
}

saveForumToDB();

?>

    <section class="blog section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-12 offset-lg-0 text-center">
                    <h3>Click to return to Main page</h3>
                    <a href="Forum.php" class="btn btn-transparent text-center">Back to Forum</a>
                </div>
            </div>
        </div>
    </section>

<?php include "footer.inc.php"; ?>


</body>
</html>