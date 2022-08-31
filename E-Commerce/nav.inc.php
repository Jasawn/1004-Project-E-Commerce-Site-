<!--IonIcons link-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<link rel="stylesheet" href="css/main1.css">
<link rel="stylesheet" href="css/main.css">

<script defer src="js/main1.js"></script>

<?php
    require_once('divcreate.php');
?>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class='container'>
        <a class="row navbar-brand web-container" href="index.php">
            <img class ="logo-img rounded" src="images/logo.png" alt="Logo"
                 title="Logo"/>
            <div class="site-name-div">
                <h2 class='site-name'>Beforeshock</h2>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link nav-page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <div class='dropdown'>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" aria-haspopup="true" aria-expanded="false">
                            Shop
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="collapsibleNavbar">
                            <a class="dropdown-item" href="main_product.php">All Products</a>
                            <a class="dropdown-item" href="main_product.php?category=Keyboard">Keyboards</a>
                            <a class="dropdown-item" href="main_product.php?category=Mouse">Mouses</a>
                            <a class="dropdown-item" href="main_product.php?category=Monitor">Monitors</a>
                            <a class="dropdown-item" href="main_product.php?category=Headphone">Headphones</a>
                            <a class="dropdown-item" href="main_product.php?category=Speaker">Speakers</a>
                            <a class="dropdown-item" href="main_product.php?category=Camera">Cameras</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class='dropdown'>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" aria-haspopup="true" aria-expanded="false">
                            Pages
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="collapsibleNavbar">
                            <a class="dropdown-item" href="Forum.php">Forum</a>
                            <a class="dropdown-item" href="FAQ.php">FAQ</a>
                            <a class="dropdown-item" href="AboutUs.php">About Us</a>
                        </div>
                    </div>
                </li>
                <?php
                    if (isset($_SESSION['email'])) {
                        echo <<<END
                            <li class="nav-item">
                                <a class="btn btn-light" href="profile.php">Profile</a>  
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-dark" href="logout.php">Logout</a>  
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0" id="cart">
                                    <ion-badge class = "quantity" id="cart-quantity">0</ion-badge>
                                    <ion-icon name="cart-outline" size="large"></ion-icon>
                                </a>
                            </li>
                        END;
                    }
                    else {
                        echo <<<END
                        <li class="nav-item">
                            <a class="btn btn-light" href="login.php">Login</a>  
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark" href="register.php">Signup</a>  
                        </li>
                        END;
                    }
                
                ?>
            </ul>
            <div class ="drop-shopping-cart">
                <div class ="shopping-cart-header">
                    <ion-icon name="cart-outline" class ="cart-icon" size="large"></ion-icon>
                    <div class="cart-amount">
                        <span class="light-text"> Total: $</span>
                        <span class="total-price"> </span>
                    </div>
                </div>

                <p id = "shopping-cart-header-empty"> Add something to your cart :(</p>

                <ul id ="cart-items">
                    <?php
                        loadcartitems();
                    ?>
                </ul>
                <a class="btn btn-secondary managecart-button" href="cart.php">Manage Cart Items</a>
            </div>
        </div>
    </div>
</nav>