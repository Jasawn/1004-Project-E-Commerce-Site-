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
				<h3>New Post</h3>
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
                <!-- upload picture -->
                <form action="ProcessNewForum.php" method="post" enctype="multipart/form-data">
                    <fieldset class="p-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" id="title" name="title" placeholder="Title *" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <select name="category" id="category" class="form-control w-100">
                            <option value="" disabled selected>Select Category</option>
                            <option value="1">Reviews on New tech</option>
                            <option value="2">General (Trouble Shooting)</option>
                            <option value="3">Hardware (Trouble Shooting)</option>
                            <option value="4">Software (Trouble Shooting)</option>
                        </select>
                        <textarea name="content" id="content"  placeholder="Content *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                        <h3>Select image to upload:</h3>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <div class="btn-grounp">
                            <button type="submit" class="btn btn-primary mt-2 float-right">SUBMIT</button>
                        </div>
                    </fieldset>
                </form>
                
                
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

