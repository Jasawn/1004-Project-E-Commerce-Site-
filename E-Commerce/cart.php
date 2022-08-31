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
</head>

<body>
    <?php
    include"nav.inc.php";
    ?>

    <main class ="cart-container container lg mh-80">
        <h1>Your Cart</h1>
        <hr noshade>
        <h2 id = "cart-head">Your Cart is Empty :( Add Something To Your Cart!</h2>

        <div class="cart-page">
            <div class="cart-page-header">
                <h3 class="cart-page-heading">Shopping Cart</h3>
                <h5 class="cart-page-remove-all" id="removeall">Remove All</h5>
            </div>
            <?php
                loadcartpage();
            ?>

            <hr noshade class="cartpage">
            <div class="cart-page-checkout">
                <div class="cart-page-total">
                    <div>
                        <div class="cart-page-totalamt">Sub-Total</div>
                        <div class="cart-page-totalquantity"></div><span>items</span>
                    </div>
                    <span class="cart-page-totalprice-span">SGD$</span><span class="cart-page-totalprice"></span>
                </div>
                <button class="cart-page-checkoutbutton">Make Payment</button>
            </div>  
        </div>
    </main>

    <?php
    include "footer.inc.php";
    ?>

</body>
</html>