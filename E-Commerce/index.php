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
        
        <!--IonIcons link-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        
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
                    <li data-target="#carousel-controls" data-slide-to="1"></li>
                </ol>

                <div class='h-100 carousel-inner carousel-banner'>
                    <div class='h-100 carousel-item active'>
                        <video autoplay loop preload muted poster="images/Xeneon-32QHD165-Gaming-Monitor.jpg">
                            <source src="images/Xeneon-32QHD165-Gaming-Monitor.webm">
                        </video>
                        <h1 class="carousel-video-title">XENEON 32QHD165 Gaming Monitor</h1>
                        <p class="carousel-video-desc">Ultra-slim, blazing fast, and supremely accurate. XENEON is the go-to for gamers who only need the best.</p>
                        <a class="btn btn-lg btn-warning carousel-video-btn rounded-0" href="individual_product.php?product-name=CORSAIR%20XENEON%2032QHD165%20Gaming%20Monitor">SHOP NOW</a>
                    </div>
                    <div class='h-100 carousel-item'>
                        <video autoplay loop preload muted poster="images/ChampionSeries_k70TKL_SabrePRO_SabreRGBPro.jpg">
                            <source src="images/ChampionSeries_k70TKL_SabrePRO_SabreRGBPro.webm">
                        </video>
                        <h1 class="carousel-video-title">K70 RGB TKL CHAMPION SERIES</h1>
                        <p class="carousel-video-desc">A competition-grade mechanical gaming keyboard, developed through years of testing with top esports professionals.</p>
                        <a class="btn btn-lg btn-warning carousel-video-btn rounded-0" href="individual_product.php?product-name=K70%20RGB%20MK.2%20Mechanical%20Gaming%20Keyboard">SHOP NOW</a>
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
        
        <main>
            <section class="product-category-section">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>Product Category</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                                
                                <ol class="carousel-indicators category-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                </ol>
                                
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="h-100 row">
                                            <div class="col-3 carousel-div">
                                                <a href="main_product.php?category=Keyboard">
                                                    <img class ="category-img" src="images/Keyboard.png" alt="Keyboard Category"/>
                                                    <p class="category-img-desc">Keyboards</p>
                                                </a>
                                            </div>
                                            <div class="col-3 carousel-div">
                                                <a href="main_product.php?category=Mouse">
                                                    <img class ="category-img" src="images/Mouse.png" alt="Mouse Category"/>
                                                    <p class="category-img-desc">Mouses</p>
                                                </a>
                                            </div>
                                            <div class="col-3 carousel-div">
                                                <a href="main_product.php?category=Monitor">
                                                    <img class ="category-img" src="images/Monitor.png" alt="Monitors Category"/>
                                                    <p class="category-img-desc">Monitors</p>
                                                </a>
                                            </div>
                                            <div class="col-3 carousel-div">
                                                <a href="main_product.php?category=Headphone">
                                                    <img class ="category-img" src="images/Headphones.jpg" alt="Headphones Category"/>
                                                    <p class="category-img-desc">Headphones</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="h-100 row">
                                            <div class="col-3 carousel-div">
                                            </div>
                                            <div class="col-3 carousel-div">
                                                <a href="main_product.php?category=Speaker">
                                                    <img class ="category-img" src="images/Speakers.jpg" alt="Speakers Category"/>
                                                    <p class="category-img-desc">Speakers</p>
                                                </a>
                                            </div>
                                            <div class="col-3 carousel-div">
                                                <a href="main_product.php?category=Camera">
                                                    <img class ="category-img" src="images/Cameras.jpg" alt="Cameras Category"/>
                                                    <p class="category-img-desc">Cameras</p>
                                                </a>
                                            </div>
                                            <div class="col-3 carousel-div">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="bi bi-arrow-bar-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="bi-arrow-bar-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="featured-section">
                <div class="container-xl pb-3 text-center">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="featured-section-title">Recently Released</h2>
                                <p>Browse our latest products</p>
                            </div>
                        </div>
                        <?php
                    global $name, $quantity, $originalPrice, $salePercentage, $sale, $description, $image, $category, $rating, $currentPrice;
                    
                    // Create database connection.    
                    $config = parse_ini_file('../../private/db-config.ini');
                    $conn = new mysqli($config['servername'], $config['username'],
                            $config['password'], $config['dbname']);
                    // Check connection    
                    if ($conn->connect_error) {
                        $errorMsg = "Connection failed: " . $conn->connect_error;
                        $success = false;
                        echo <<<END
                            $errorMsg
                        END;
                    }   
                    else {
                            $stmt = $conn->prepare("SELECT * FROM products ORDER BY date DESC LIMIT 4");

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
                                    <div class="col-lg-3 mb-5 min-vh-45">
                                        <div class="card h-100">
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

                            } 
                            else {
                                $success = false;
                            }
                            $stmt->close();
                    }
                    ?>
                    </div>
                        <a class="border btn btn-dark btn-lg rounded-0" href="main_product.php?product-sort=7">Shop More</a>
                </div>
            </section>
            
            <section class="sale-section">
                <div class="container-xl text-center">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="featured-section-title">On Sale</h2>
                                <p>Buy it while it lasts</p>
                            </div>
                        </div>
                        <?php
                            $stmt = $conn->prepare("SELECT * FROM products WHERE sale LIKE '1' ORDER BY date DESC LIMIT 4");

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
                                    <div class="col-lg-3 mb-5 min-vh-45">
                                        <div class="card h-100">
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

                            } 
                            else {
                                $success = false;
                            }
                            $stmt->close();
                            $conn->close();
                    ?>
                    </div>
                        <a class="mb-3 border btn btn-dark btn-lg rounded-0" href="main_product.php?product-sort=9">Shop More</a>
                </div>
            </section>
            
            <section class="container-fluid about-us-section">
                <div class="bg-image"></div>
                <div class="bg-text">
                    <img class ="about-us-logo rounded-circle" src="images/logo.png" alt="Logo" title="Logo"/>
                    <h2 class="about-us-title">Beforeshock</h2>
                    <p class="about-us-desc">Founded in 2015, our mission is to empower every person on the planet the resources required to achieve more. Every device goes through the assembly line, carefully handpicked, assembled and tested by a team of hardware enthisiasts to ensure upmost quality assurance.</p>
                    <a class="border btn btn-light btn-lg rounded-pill" href="AboutUs.php">ABOUT US</a>
                </div>
            </section>
        </main>
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>
