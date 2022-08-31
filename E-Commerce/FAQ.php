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
				<h3>FAQ</h3>
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
                <article>
                    <!-- Post Title -->
                    <h3>How do I change my password?</h3>
                    
                    <p class="">You can change your password in the 'Profile' Page.</p>
                </article>
                <article>
                    <!-- Post Title -->
                    <h3>What are the modes of payment?</h3>
                    
                    <p class="">We accept VISA, Mastercard & American Express.</p>
                </article>
                <article>
                    <!-- Post Title -->
                    <h3>What is Beforeshock's Return policy?</h3>
                    
                    <p class="">Faulty product (s) may be retained for testing and diagnosis before an exchange can be carried out. The returned items must be with reasonable care, such as not showing wear and tear or damaged box/packaging. In the event with no exchange in the product, a credit voucher may be offered and must be utilized within one (01) month. Extension of the expiry date is not permitted.</p>
                </article>
                <article>
                    <!-- Post Title -->
                    <h3>My system is out of warranty do I still get any support?</h3>
                    
                    <p class="">Beforeshock provides free life time service support for original purchasers of our systems. So if your warranty has expired you may call or email our support staff for assistance. (Note: Price for parts will still be charged if your parts warranty has expired)</p>
                </article>
                <article>
                    <!-- Post Title -->
                    <h3>Where are Beforeshock's systems assembled?</h3>
                    
                    <p class="">All Beforeshock systems shipped in Singapore are assembled by our local production team based in Singapore, while units shipped in Australia are assembled in Australia by a local team based in Australia.</p>
                </article>
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

<script type="text/javascript">
    document.getElementById("NewForum").onclick = function () {
        location.href = "NewForum.php";
    };
</script>

</body>

</html>