<?php
include_once("include/function.php");
$fetchdata=new DB_con();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About us  - <?php echo $project;  ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->

    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>

    <div class="about-wrapper">
        <?php include 'include/header.php'; ?>
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative mb-text-p">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">About Us</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- About Us Area Start Here -->
        <!-- Feature Area Start Here -->
        <div class="feature-area mb-no-text">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-12 col-custom">
                        <div class="feature-content-wrapper">
                            <h2 class="title">Welcome to KhishPortal,</h2>
                            <p class="desc-content">
Hello, welcome to KhishPortal, through this website you will get daily market price information, market prices of Neemuch district, Mandsaur district and other surrounding districts and also information about new farming crops. And information on growing technologies in agriculture and information related to all the schemes being run by the government for whom.</p>
                           
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-12 col-custom">
                        <div class="feature-image position-relative">
                            <img src="assets/images/feature/feature-1.jpg" alt="Obrien Feature">
                            <div class="popup-video position-absolute">
                                <a class="popup-vimeo" href="https://www.youtube.com/watch?v=w77zPAtVTuI">
                                    <i class="ion-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Area End Here -->
        <!-- Newslatter Area Start Here -->
        <div class="newsletter-area mt-no-text mb-text-p">
            <div class="container container-default h-100 custom-area">
                <div class="row h-100">
                    <div class="col-lg-8 col-xl-5 offset-xl-6 offset-lg-3 col-custom">
                        <div class="newsletter-content text-center d-flex flex-column align-items-center justify-content-center h-100">
                            <div class="section-content">
                                <h4 class="title-4 text-uppercase">Special <span>Offer</span> for subscription</h4>
                                <h2 class="title-3 text-uppercase">Get instant update of daily market rates</h2>
                                <p class="desc-content">Subscribe our newsletter and all latest news of our <br>latest plant info and daily rates</p>
                            </div>
                            <div class="newsletter-form-wrap ml-auto mr-auto">
                                <form id="mc-form" class="mc-form d-flex position-relative">
                                    <input type="email" id="mc-email" class="form-control email-box" placeholder="email@example.com" name="EMAIL">
                                    <button id="mc-submit" class="btn primary-btn obrien-button newsletter-btn position-absolute" type="submit">Subscribe</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                                </div>
                                <!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newslatter Area End Here -->
       <!-- Banner Area Start Here -->
        <div class="banner-area mb-5 mt-5">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-custom">
                        <div class="banner-image hover-style">
                            <a class="d-block" href="weather.php">
                                <img class="w-100" src="assets/images/banner/small-banner/1-1.png" alt="Banner Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-custom">
                        <div class="banner-image hover-style">
                            <a class="d-block" href="weather.php">
                                <img class="w-100" src="assets/images/banner/small-banner/1-2.png" alt="Banner Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-custom">
                        <div class="banner-image hover-style mb-0">
                            <a class="d-block" href="weather.php">
                                <img class="w-100" src="assets/images/banner/small-banner/1-3.png" alt="Banner Image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End Here -->
         <!-- About Us Area End Here -->
 
<?php include 'include/footer.php'; ?>

</body>

</html>