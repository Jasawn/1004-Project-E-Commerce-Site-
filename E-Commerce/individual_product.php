<!DOCTYPE html>
<?php
    session_start();
    $email = $_SESSION['email'];
?>
<html lang="en">
    <head>
        <title>Beforeshock</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity=
        "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
        
        <link rel="stylesheet" href="css/main.css">
        
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
        
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
        
        <!--Custom JS -->
        <script defer src="js/individual_product.js"></script>
    </head>
    <body>
        <?php
            include "nav.inc.php";
        ?>
        <main id="individual-main-container" class="container mt-3">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="individual-main-container" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="modal-img" src="images/empty.png" alt="images/empty.png"/>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST["reviewRating"]) && isset($_POST["review-content"])) {
                $email = $_SESSION['email'];
                saveMemberToDB1();
            }

            function sanitize_input1($data) {
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            function getAndDisplayProfileInfo() {
                $email = $_SESSION['email'];
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
            // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $stmt = $conn->prepare("SELECT * FROM project_members WHERE email=?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    $email = $row["email"];
                    $password = $row["password"];
                    $address = $row["address"];
                    $bio = $row["bio"];
                    $profileImg = $row["profileImage"];
                } else {
                    echo "0 results";
                }
                $userProfileInfo = [$fname, $lname, $email, $password, $address, $bio, $profileImg];
                $stmt->close();
                $conn->close();
                return $userProfileInfo;
            }

            function saveMemberToDB1() {
                $email = $_SESSION['email'];
                $userInfo = getAndDisplayProfileInfo();
                $dateTime = date('Y-m-d H:i:s');
                $productName = $_GET["product-name"];
                $newReviewContent = sanitize_input1($_POST["review-content"]);
                $reviewRating = $_POST["reviewRating"];
                if ($userInfo[0] == ""){
                    $username = $userInfo[1];
                }
                else {
                    $username = $userInfo[0] . " " . $userInfo[1];
                }

                // Create database connection.
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);

                // Check connection    
                if ($conn->connect_error) {
                    $success = false;
                } else {
                    // Prepare the statement:        
                    $stmt = $conn->prepare("INSERT INTO project.reviews (productName, reviewerName, date, rating, content, email) VALUES (?, ?, ?, ?, ?, ?)");

                    // Bind & execute the query statement:        
                    $stmt->bind_param("ssssss", $productName, $username, $dateTime, $reviewRating, $newReviewContent, $email);
                    $stmt->execute();
                    $stmt->close();
                }
                $conn->close();
            }
            ?>
            
            <?php
                global $productID, $name, $quantity, $originalPrice, $salePercentage, $sale, $description, $image, $category, $rating, $currentPrice, $details;
                $name = ($_GET["product-name"]);
                
                $starfill = 'bi-star-fill';
                $starhalf = 'bi-star-half';
                $star = 'bi-star';
                
                // Create database connection.    
                    $config = parse_ini_file('../../private/db-config.ini');
                    $conn = new mysqli($config['servername'], $config['username'],
                            $config['password'], $config['dbname']);
                    // Check connection    
                    if ($conn->connect_error) {
                        $errorMsg = "Connection failed: " . $conn->connect_error;
                        $success = false;
                    }   
                    
                    else {
                            $stmt = $conn->prepare("SELECT * FROM products WHERE name='$name'");

                            // Bind & execute the query statement:        
                            $stmt->bind_param("dsdsssdsssss", $productID, $name, $quantity, $originalPrice, $currentPrice, $salePercentage, $sale, $description, $image, $category, $rating, $details);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {   
                                while ($row = $result->fetch_assoc()) {
                                    $productID = $row["id"];
                                    $name = $row["name"];
                                    $quantity = $row["quantity"];
                                    $originalPrice = $row["originalPrice"];
                                    $currentPrice = $row["currentPrice"];
                                    $salePercentage = $row["salePercentage"];
                                    $sale = $row["sale"];
                                    $description = $row["description"];
                                    $image = $row["image"];
                                    $category = $row["category"];
                                    $rating = $row["rating"];
                                    $details = $row["details"];

                                    echo <<<END
                                    <div class="row">
                                        <div class="col-md">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="main_product.php?category=$category">$category</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">$name</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                    END;
                                }
                            } 
                            else {
                                $success = false;
                            }
                            $stmt->close();
                    }
            ?>
            
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="col card single-product-slider">
                        <div id="carousel-controls" class='h-100 carousel slide' data-ride='carousel' data-interval="false">
                            <?php
                            echo <<<END
                                <div class='h-100 carousel-inner'>
                                <div class='h-100 carousel-item active'>
                                    <div class="carousel-item-inner h-100">
                                        <img class="d-block img-fluid product-img" src='$image' alt='Slide 1' data-zoom-image="$image"/>
                                    </div>
                                </div>
                            END;
                            
                            $stmt = $conn->prepare("SELECT * FROM images WHERE productname='$name'");

                            // Bind & execute the query statement:        
                            $stmt->bind_param("s", $images);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            $count = 1;
                            
                            if ($result->num_rows > 0) {   
                                while ($row = $result->fetch_assoc()) {
                                    $images = $row["images"];
                                    
                                    $count = $count + 1;
                                    
                                    echo <<<END
                                    <div class='h-100 carousel-item'>
                                        <div class="carousel-item-inner h-100">
                                            <img class="d-block img-fluid product-img" src='$images' alt='Slide $count' data-zoom-image="$images"/>
                                        </div>
                                    </div>
                                    END;
                                }
                                echo <<<END
                                </div>
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-controls" data-slide-to="0" class="active"></li>
                                END;
                                
                                for ($x = 1; $x < $count; $x++) {
                                    echo <<<END
                                    <li data-target="#carousel-controls" data-slide-to="$x"></li>
                                    END;
                                }
                            } 
                            else {
                                echo <<<END
                                </div>
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-controls" data-slide-to="0" class="active"></li>
                                END;
                                
                                $success = false;
                            }
                            $stmt->close();
                            ?>
                            </ol>
                            
                            <!-- sag sol -->
                            <a class="carousel-control-prev" href="#carousel-controls" role="button" data-slide="prev">
                                <span class="bi bi-arrow-bar-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-controls" role="button" data-slide="next">
                                <span class="bi bi-arrow-bar-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <?php
                        echo <<<END
                            <div class="single-product-details">
                                <h2 class="mt-2">$name</h2>

                                <p class="product-description mt-20">
                                    $description
                                </p>
                                
                                <div class="individual-product-star d-flex justify-content-center small text-warning mb-2">
                        END;
                        if ((float) $rating < 0.25) {
                            echo "<div class=$star></div>";
                        } else if ((float) $rating < 0.75) {
                            echo "<div class=$starhalf></div>";
                        } else {
                            echo "<div class=$starfill></div>";
                        }

                        if ((float) $rating < 1.25) {
                            echo "<div class=$star></div>";
                        } else if ((float) $rating < 1.75) {
                            echo "<div class=$starhalf></div>";
                        } else {
                            echo "<div class=$starfill></div>";
                        }

                        if ((float) $rating < 2.25) {
                            echo "<div class=$star></div>";
                        } else if ((float) $rating < 2.75) {
                            echo "<div class=$starhalf></div>";
                        } else {
                            echo "<div class=$starfill></div>";
                        }

                        if ((float) $rating < 3.25) {
                            echo "<div class=$star></div>";
                        } else if ((float) $rating < 3.75) {
                            echo "<div class=$starhalf></div>";
                        } else {
                            echo "<div class=$starfill></div>";
                        }

                        if ((float) $rating < 4.25) {
                            echo "<div class=$star></div>";
                        } else if ((float) $rating < 4.75) {
                            echo "<div class=$starhalf></div>";
                        } else {
                            echo "<div class=$starfill></div>";
                        }
                        
                        echo <<<END
                        </div><p class="product-individual-properties">$rating rating</p>
                        END;

                if ($sale == "1"){
                            echo <<<END
                            <div class="product-div">
                                <b>Price:</b>
                                <p class="product-individual-properties">$$currentPrice</p>
                                <p class="product-individual-properties old-price">$$originalPrice</p>
                            </div>
                            END;
                        } 
                        else {
                            echo <<<END
                            <div class="product-div">
                                <b>Price:</b>
                                <p class="product-individual-properties">$$currentPrice</p>
                            </div>
                            END;
                        }
                                        
                        echo <<<END
                                <div class="product-div">
                                    <b>Stock:</b>
                                    <p class="product-individual-properties">$quantity</p>
                                </div>
                                <label class="product-id-class" style="display:none">$productID</label>
                                <label class="product-price-class" style="display:none">$currentPrice</label>
                                <label class="product-image-class" style="display:none">$image</label>
                                <label class="product-name-class" style="display:none">$name</label>
                                <label class="product-desc-class" style="display:none">$description</label>
                                <label class="product-quantity-class" style="display:none">1</label>
                                <button id="add-to-cart-btn" class="btn btn-dark mt-20 rounded-0">Add To Cart</button>
                            </div>
                        END;
                    ?>
                </div>
            </div>
            
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-sm bg-light">

                            <ul class="navbar-nav nav-fill w-100">
                                <li class="nav-item">
                                    <a class="nav-link" id="collapseDescBtn">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="collapseReviewBtn">Reviews</a>
                                </li>
                            </ul>

                        </nav>
                    </div>
                    
                    <div class="min-vh-25 col-md-12" id="collapseDesc">
                                <div class="min-vh-25 card card-body">
                    <?php
                        echo <<<END
                            $details
                        END;
                    ?>
                                </div>
                    </div>

                    <div class="min-vh-25 col-md-12" id="collapseReview">
                        <div class="min-vh-25 card card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <?php
                                        global $reviewerName, $reviewDate, $reviewRate, $reviewContent, $reviewerEmail;
                                        
                                        function getAndDisplayProfileInfo1(string $reviewerEmail) {
                                            $config = parse_ini_file('../../private/db-config.ini');
                                            $conn = new mysqli($config['servername'], $config['username'],
                                                    $config['password'], $config['dbname']);
                                        // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $stmt = $conn->prepare("SELECT * FROM project_members WHERE email=?");
                                            $stmt->bind_param("s", $reviewerEmail);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $fname = $row["fname"];
                                                $lname = $row["lname"];
                                                $email = $row["email"];
                                                $password = $row["password"];
                                                $address = $row["address"];
                                                $bio = $row["bio"];
                                                $profileImg = $row["profileImage"];
                                            } else {
                                                echo "0 results";
                                            }
                                            $userProfileInfo = [$fname, $lname, $email, $password, $address, $bio, $profileImg];
                                            $stmt->close();
                                            $conn->close();
                                            return $userProfileInfo;
                                        }
                                   
                                            $stmt = $conn->prepare("SELECT * FROM reviews WHERE productName='$name'");

                                            // Bind & execute the query statement:        
                                            $stmt->bind_param("siss", $reviewerName, $reviewDate, $reviewRate, $reviewContent, $reviewerEmail);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {   
                                                while ($row = $result->fetch_assoc()) {
                                                    
                                                    $reviewerName = $row["reviewerName"];
                                                    $reviewDate = $row["date"];
                                                    $reviewRate = $row["rating"];
                                                    $reviewContent = $row["content"];
                                                    $reviewerEmail = $row["email"];
                                                    
                                                    $userInfo1 = getAndDisplayProfileInfo1($reviewerEmail);
                                                    
                                                    echo <<<END
                                                        <div class="row review">

                                                            <div class="col-md-1">
                                                                <img class ="review-image rounded" src="$userInfo1[6]" alt="Logo" title="Pets"/>
                                                            </div>

                                                            <div class="col-md-11">
                                                                <h5 class="review-name">$reviewerName</h5>
                                                                <p class="review-date">$reviewDate</p>
                                                                <div class="review-stars d-flex small text-warning mt-0">
                                                    END;
                                                                    if ((float)$reviewRate < 0.25)
                                                                    {
                                                                        echo "<div class=$star></div>";
                                                                    }
                                                                    else if ((float)$reviewRate < 0.75)
                                                                    {
                                                                        echo "<div class=$starhalf></div>";
                                                                    }
                                                                    else {
                                                                        echo "<div class=$starfill></div>";
                                                                    }

                                                                    if ((float)$reviewRate < 1.25)
                                                                    {
                                                                        echo "<div class=$star></div>";
                                                                    }
                                                                    else if ((float)$reviewRate < 1.75)
                                                                    {
                                                                        echo "<div class=$starhalf></div>";
                                                                    }
                                                                    else {
                                                                        echo "<div class=$starfill></div>";
                                                                    }

                                                                    if ((float)$reviewRate < 2.25)
                                                                    {
                                                                        echo "<div class=$star></div>";
                                                                    }
                                                                    else if ((float)$reviewRate < 2.75)
                                                                    {
                                                                        echo "<div class=$starhalf></div>";
                                                                    }
                                                                    else {
                                                                        echo "<div class=$starfill></div>";
                                                                    }

                                                                    if ((float)$reviewRate < 3.25)
                                                                    {
                                                                        echo "<div class=$star></div>";
                                                                    }
                                                                    else if ((float)$reviewRate < 3.75)
                                                                    {
                                                                        echo "<div class=$starhalf></div>";
                                                                    }
                                                                    else {
                                                                        echo "<div class=$starfill></div>";
                                                                    }

                                                                    if ((float)$reviewRate < 4.25)
                                                                    {
                                                                        echo "<div class=$star></div>";
                                                                    }
                                                                    else if ((float)$reviewRate < 4.75)
                                                                    {
                                                                        echo "<div class=$starhalf></div>";
                                                                    }
                                                                    else {
                                                                        echo "<div class=$starfill></div>";
                                                                    }
                                                    echo <<<END
                                                                </div>
                                                                <p class="review-desc">$reviewContent</p>
                                                            </div>
                                                        </div>
                                                    END;
                                                }
                                            } 
                                            else {
                                                $success = false;
                                            }
                                            $stmt->close();
                                            $conn->close();
                                    ?>
                            </div>
                               
                                <?php
                                    if (isset($_SESSION['email'])) {
                                        echo <<<END
                                            <div class="col-md-12 mt-5">
                                                <form action="" method="post">
                                                    <h5 class="font-weight-bold">Leave a review</h5>
                                                    <h6 class="mt-3">Overall rating</h6>
                                                    <div class="form-group">
                                                        <div id="review-star-1" class="bi-star review-star"></div>
                                                        <div id="review-star-2" class="bi-star review-star "></div>
                                                        <div id="review-star-3" class="bi-star review-star"></div>
                                                        <div id="review-star-4" class="bi-star review-star"></div>
                                                        <div id="review-star-5" class="bi-star review-star"></div>
                                                        <input id="review-radio-0" class="review-radio" type="radio" name="reviewRating" value="0">
                                                        <input id="review-radio-1" class="review-radio" type="radio" name="reviewRating" value="1">
                                                        <input id="review-radio-2" class="review-radio" type="radio" name="reviewRating" value="2">
                                                        <input id="review-radio-3" class="review-radio" type="radio" name="reviewRating" value="3">
                                                        <input id="review-radio-4" class="review-radio" type="radio" name="reviewRating" value="4">
                                                        <input id="review-radio-5" class="review-radio" type="radio" name="reviewRating" value="5">
                                                        <a id="rating-clear" class="rating-clear">Clear</a>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <h6>Add a written review</h6>
                                                        <textarea class="form-control" id="review-content" name="review-content" rows="3" required></textarea>
                                                    </div>
                                                    <button id="review-submit-btn" type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        END;
                                    }
                                ?>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>
