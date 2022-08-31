<!DOCTYPE html>
<?php
    session_start();
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
        <script defer src="js/main.js"></script>
    </head>
    <body>
        <?php
            include "nav.inc.php";
        ?>
        <header class="vh-70 jumbotron text-center p-0">
            <div id="carousel-controls" class='h-100 carousel slide' data-ride='carousel' data-interval="false">

                <ol class="carousel-indicators">
                    <li data-target="#carousel-controls" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-controls" data-slide-to="1" class="active"></li>
                </ol>

                <div class='h-100 carousel-inner carousel-banner'>
                    <div class='h-100 carousel-item active'>
                        <?php
                            if ($_GET["category"]) {
                                $category = $_GET["category"];
                                $bannerName = $_GET["category"] . "Banner.jpg";
                                echo <<<END
                                    <img class="h-100 min-width-100 banner-img" src='images/$bannerName' alt='Banner' data-zoom-image="images/$bannerName"/>
                                    <div class="banner-text">
                                        <h1 class="display-1">$category</h1>
                                    </div>
                                END;
                            }
                            else {
                                echo <<<END
                                    <img class="h-100 min-width-100 banner-img" src='images/CameraBanner.jpg' alt='Banner' data-zoom-image="images/CameraBanner.jpg"/>
                                    <div class="banner-text">
                                        <h1 class="display-1">All Products</h1>
                                    </div>
                                END;
                            }
                        ?>
                    </div>
                    <div class='h-100 carousel-item'>
                        <?php
                            if ($_GET["category"]) {
                                $bannerName = $_GET["category"] . "Banner.jpg";
                                echo <<<END
                                    <img class="h-100 min-width-100" src='images/$bannerName' alt='Banner' data-zoom-image="images/$bannerName"/>
                                    <h1 class="carousel-video-title">XENEON 32QHD165 Gaming Monitor</h1>
                                    <p class="carousel-video-desc">Ultra-slim, blazing fast, and supremely accurate. XENEON is the go-to for gamers who only need the best.</p>
                                    <a class="btn btn-lg btn-warning carousel-video-btn rounded-0" href="individual_product.php?product-name=CORSAIR%20XENEON%2032QHD165%20Gaming%20Monitor">SHOP NOW</a>
                                END;
                            }
                            else {
                                echo <<<END
                                    <img class="h-100 min-width-100" src='images/CameraBanner.jpg' alt='Banner' data-zoom-image="images/CameraBanner.jpg"/>
                                    <h1 class="carousel-video-title">XENEON 32QHD165 Gaming Monitor</h1>
                                    <p class="carousel-video-desc">Ultra-slim, blazing fast, and supremely accurate. XENEON is the go-to for gamers who only need the best.</p>
                                    <a class="btn btn-lg btn-warning carousel-video-btn rounded-0" href="individual_product.php?product-name=CORSAIR%20XENEON%2032QHD165%20Gaming%20Monitor">SHOP NOW</a>
                                END;
                            }
                        ?>
                    </div>
                </div>

                <!-- sag sol -->
                <a class="carousel-control-prev homepage-control-prev" href="#carousel-controls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next homepage-control-prev-next" href="#carousel-controls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>
        
        <main class="container">
            <div class="col-md-12">
                <div class="section-title">
                    <?php
                    if ($_GET["category"]) {
                        $category = $_GET["category"];
                        $temp = $_GET["category"] . 's';
                        echo <<<END
                            <h2>Browse Our $temp</h2>
                        END;
                    }
                    else {
                        echo <<<END
                            <h2>Browse All Products</h2>
                        END;
                    }
                    ?>
                </div>
            </div>
            <div class="advance-search">
                <div class="container-xl text-center">
                    <h5 class="refine-results">Refine results</h5>
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 align-content-center">
                            <form action="main_product.php" method="get">
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <input type="text" class="form-control my-2 my-lg-1" id="product-search" name="product-search" placeholder="Search for product">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <select id="product-sort" name="product-sort" class="w-100 form-control mt-lg-1 mt-md-2" aria-label="Sort products">
                                            <option value="1">Rating: High to Low</option>
                                            <option value="2">Rating: Low to high</option>
                                            <option value="3">Price: High to Low</option>
                                            <option value="4">Price: Low to High</option>
                                            <option value="5">Name: A to Z</option>
                                            <option value="6">Name: Z to A</option>
                                            <option value="7">Date: New to Old</option>
                                            <option value="8">Date: Old to New</option>
                                            <option value="9">On Sale</option>
                                        </select>
                                    </div>
                                    <?php
                                        if ($_GET["category"]) {
                                            echo <<<END
                                            <input type="hidden" id="category" name="category" value="$category">
                                        END;
                                        }
                                    ?>
                                    <div class="form-group col-md-2 align-self-center">
                                        <button id="sort-btn" type="submit" class="btn btn-primary">Search Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-xl mt-5">
                <div class="row">
                    <?php
                    global $name, $quantity, $originalPrice, $currentPrice, $salePercentage, $sale, $description, $image, $category, $rating, $categoryStatement;
                    
                    if (($_GET["product-sort"]) != 0)
                    {     
                        $sort = ($_GET["product-sort"]);
                    }
                    else 
                    {
                        $sort = 0;
                    }
                        
                    if ($_GET["product-search"])
                    {     
                        $search = $_GET["product-search"];
                    }
                    
                    if ($_GET["category"])
                    {     
                        $categoryStatement = "category LIKE " . "'" . $_GET["category"] . "'";
                    }
                    
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
                            if (($_GET["product-sort"]) == 1)
                            {     
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY rating DESC");

                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' and $categoryStatement ORDER BY rating DESC");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY rating DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY rating DESC");
                                    } 
                                }
                            } 
                            else if (($_GET["product-sort"]) == 2)
                            {    
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY rating");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' and $categoryStatement ORDER BY rating");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY rating");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY rating");
                                    } 
                                }
                            }
                            else if (($_GET["product-sort"]) == 3)
                            {    
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY CAST(currentPrice as DECIMAL(10,2)) DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' AND $categoryStatement ORDER BY CAST(currentPrice as DECIMAL(10,2)) DESC");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY CAST(currentPrice as DECIMAL(10,2)) DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY CAST(currentPrice as DECIMAL(10,2)) DESC");
                                    } 
                                }
                            }
                            else if (($_GET["product-sort"]) == 4)
                            {    
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY CAST(currentPrice as DECIMAL(10,2))");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' AND $categoryStatement ORDER BY CAST(currentPrice as DECIMAL(10,2))");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY CAST(currentPrice as DECIMAL(10,2))");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY CAST(currentPrice as DECIMAL(10,2))");
                                    } 
                                }
                            }
                            else if (($_GET["product-sort"]) == 5)
                            {    
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY name");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' AND $categoryStatement ORDER BY name");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY name");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY name");
                                    } 
                                }
                            }
                            else if (($_GET["product-sort"]) == 6)
                            {    
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY name DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' AND $categoryStatement ORDER BY name DESC");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY name DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY name DESC");
                                    } 
                                }
                            }
                            else if (($_GET["product-sort"]) == 7)
                            {    
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY date DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' AND $categoryStatement ORDER BY date");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY date DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY date");
                                    } 
                                }
                            }
                            else if (($_GET["product-sort"]) == 8)
                            {    
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY date");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' AND $categoryStatement ORDER BY date DESC");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY date");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY date DESC");
                                    } 
                                }
                            }
                            else if (($_GET["product-sort"]) == 9)
                            {    
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE sale LIKE '1' AND $categoryStatement ORDER BY rating DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' AND sale LIKE '1' AND $categoryStatement ORDER BY rating DESC");
                                    } 
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE sale LIKE '1' ORDER BY rating DESC");
                                
                                    if ($_GET["product-search"])
                                    {     
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE '%$search%' AND sale LIKE '1' ORDER BY rating DESC");
                                    } 
                                }
                            }
                            else {
                                if ($_GET["category"]) {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE $categoryStatement ORDER BY rating DESC");
                                }
                                else {
                                    $stmt = $conn->prepare("SELECT * FROM products ORDER BY rating DESC");
                                }
                            }

                            // Bind & execute the query statement:        
                            $stmt->bind_param("sdsssdssss", $name, $quantity, $originalPrice, $currentPrice, $salePercentage, $sale, $description, $image, $category, $rating);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {   
                                while ($row = $result->fetch_assoc()) {
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
                                    $hrefName = urlencode($name);

                                    $starfill = 'bi-star-fill';
                                    $starhalf = 'bi-star-half';
                                    $star = 'bi-star';

                                    echo <<<END
                                    <div class="col-lg-3 mb-5 main-product-card">
                                        <div class="card h-100 pb-10">
                                    END;
                                    if ($sale == "1") {
                                        echo <<<END
                                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                                        END;
                                    }
                                    echo <<<END
                                        <!-- Product image-->
                                        <div class="h-50 card-img-top border">
                                        <a class="card-img-top" href="individual_product.php?product-name=$hrefName">
                                            <img class="img-fluid" src="$image" alt="$image" />
                                        </a>
                                        </div>
                                        <!-- Product details-->
                                        <div class="card-body p-4 text-center">
                                            <!-- Product name-->
                                            <a class="product-name" href="individual_product.php?product-name=$hrefName">$name</a>
                                            <div class="product-star d-flex justify-content-center small text-warning mb-2">
                                    END;
                                    if ((float)$rating < 0.25)
                                    {
                                        echo "<div class=$star></div>";
                                    }
                                    else if ((float)$rating < 0.75)
                                    {
                                        echo "<div class=$starhalf></div>";
                                    }
                                    else {
                                        echo "<div class=$starfill></div>";
                                    }

                                    if ((float)$rating < 1.25)
                                    {
                                        echo "<div class=$star></div>";
                                    }
                                    else if ((float)$rating < 1.75)
                                    {
                                        echo "<div class=$starhalf></div>";
                                    }
                                    else {
                                        echo "<div class=$starfill></div>";
                                    }

                                    if ((float)$rating < 2.25)
                                    {
                                        echo "<div class=$star></div>";
                                    }
                                    else if ((float)$rating < 2.75)
                                    {
                                        echo "<div class=$starhalf></div>";
                                    }
                                    else {
                                        echo "<div class=$starfill></div>";
                                    }

                                    if ((float)$rating < 3.25)
                                    {
                                        echo "<div class=$star></div>";
                                    }
                                    else if ((float)$rating < 3.75)
                                    {
                                        echo "<div class=$starhalf></div>";
                                    }
                                    else {
                                        echo "<div class=$starfill></div>";
                                    }

                                    if ((float)$rating < 4.25)
                                    {
                                        echo "<div class=$star></div>";
                                    }
                                    else if ((float)$rating < 4.75)
                                    {
                                        echo "<div class=$starhalf></div>";
                                    }
                                    else {
                                        echo "<div class=$starfill></div>";
                                    }
                                    echo <<<END
                                                </div>
                                                <p class="product-rating">($rating rating)</p>
                                                <!-- Product price-->
                                    END;
                                    if ($sale == "1"){
                                        //$newPrice = number_format(($originalPrice / 100) * (100 - $salePercentage), 2);
                                        echo <<<END
                                        <p class="product-price">$$currentPrice</p>
                                        <p class="old-price">$$originalPrice</p>
                                        <p class="sale-percent">-$salePercentage%</p>
                                        END;
                                    } 
                                    else {
                                        echo <<<END
                                        <p class="product-price">$$currentPrice</p>
                                        END;
                                    } 
                                    echo <<<END
                                        </div>
                                        </div>
                                    </div>
                                    END;
                                }

                            } else {
                                $success = false;
                            }
                            $stmt->close();
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </main>
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>
