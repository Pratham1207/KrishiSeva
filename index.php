<?php
include_once("include/function.php");
$fetchdata=new DB_con();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home - <?php echo $project;  ?></title>
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

    <div class="home-wrapper home-1">
       <?php include 'include/header.php'; ?>
        <!-- Begin Slider Area One -->
        <div class="slider-area">
            <div class="obrien-slider arrow-style" data-slick-options='{
        "slidesToShow": 1,
        "slidesToScroll": 1,
        "infinite": true,
        "arrows": true,
        "dots": true,
        "autoplay" : true,
        "fade" : true,
        "autoplaySpeed" : 7000,
        "pauseOnHover" : false,
        "pauseOnFocus" : false
        }' data-slick-responsive='[
        {"breakpoint":992, "settings": {
        "slidesToShow": 1,
        "arrows": false,
        "dots": true
        }}
        ]'>
				<?php 
				$sqlp=$fetchdata->select("tbl_slider","isactive='Y'");
				foreach($sqlp as $row){
				?>
                <div class="slide-item bg-position slide-bg-1 animation-style-01" style="background-image: url(admin/images/slider/<?php echo $row["img_url"]; ?>);">
                    <div class="slider-content">
                        <h4 class="slider-small-title" ><?php echo $row["description"]; ?></h4>
                        <h2 class="slider-large-title" ><?php echo $row["title"]; ?></h2>
                        <div class="slider-btn">
                            
                        </div>
                    </div>
                </div>
				<?php } ?>
				</div>
        </div>
        <!-- Slider Area One End Here -->
        <!-- Feature Area Start Here -->
        <div class="feature-area">
            <div class="container container-default custom-wrapper">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-12 col-custom">
                        <div class="feature-content-wrapper">
                             <h2 class="title">Welcome to KhishiSeva,</h2>
                            <p class="desc-content">
Hello, welcome to KhishPortal, through this website you will get daily market price information, market prices of Neemuch district, Mandsaur district and other surrounding districts and also information about new farming crops. And information on growing technologies in agriculture and information related to all the schemes being run by the government for whom.</p>
                           
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-12 col-custom">
                        <div class="feature-image">
                            <img src="assets/images/feature/feature-1.jpg" alt="Obrien Feature">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Area End Here -->
        <!-- Product Area Start Here -->
        <div class="product-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Weather Forcast</h2>
                            <div class="desc-content">
                                <p>All best seller product are now available for you and your can buy this product from here any time any where so sop now</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-12 product-wrapper col-custom">
                        <div id="weatherapi-weather-widget-2"></div><script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=165256&wid=2&tu=1&div=weatherapi-weather-widget-2' async></script><noscript><a href="https://www.weatherapi.com/weather/q/farmers-165256" alt="Hour by hour Farmers weather">10 day hour by hour Farmers weather</a></noscript><div id="weatherapi-weather-widget-2"></div><script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=165256&wid=2&tu=1&div=weatherapi-weather-widget-2' async></script><noscript><a href="https://www.weatherapi.com/weather/q/farmers-165256" alt="Hour by hour Farmers weather">10 day hour by hour Farmers weather</a></noscript>		

                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->
        <!-- Banner Fullwidth Area Start Here -->
        <!-- <div class="banner-fullwidth-area">
            <div class="container custom-wrapper">
                <div class="row">
                    <div class="col-md-5 col-lg-6 text-center col-custom">
                        <div class="banner-thumb h-100 d-flex justify-content-center align-items-center">
                            <img src="assets/images/banner/thumb/1.png" alt="Banner Thumb">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6 text-center justify-content-center col-custom">
                        <div class="banner-flash-content d-flex flex-column align-items-center justify-content-center h-100">
                            <h2 class="deal-head text-uppercase">Flash Deals</h2>
                            <h3 class="deal-title text-uppercase">Hurry up and Get 25% Discount</h3>
                             <a href="shop.html" class="obrien-button primary-btn">Shop Now</a> -->
                            <!-- <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2022/12/24"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Banner Fullwidth Area End Here -->
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
        </div> -->
        <!-- Banner Area End Here -->
        
	
				<!-- Product Area Start Here -->
        <div class="product-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Our ColdStores</h2>
                            <div class="desc-content">
                                <p>All best seller product are now available for you and your can buy this product from here any time any where so sop</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-wrapper col-lg-12 col-custom">
                        <div class="product-slider" data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "arrows": false,
                    "dots": false
                    }' data-slick-responsive='[
                    {"breakpoint": 1200, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint": 992, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint": 576, "settings": {
                    "slidesToShow": 1
                    }}
                    ]'>
					 <?php  $sqlp=$fetchdata->select("tbl_coldstorage");
							foreach($sqlp as $row) {
								?>
                            <div class="single-item">
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="coldstorage.php">
                                            <img src="assets/images/product/coldstorage.jpg" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/coldstorage.jpg" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                      <br/>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href=""><?php echo ucwords($row["title"]); ?></a></h4>
                                        </div>
										<hr/>
										<p class="desc-content"><?php echo $row["description"]; ?></p>
                                        
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                       
                                    </div>
                                </div>
                            </div>
							<?php } ?>	    
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->
        <!-- Newslatter Area Start Here -->
        <div class="newsletter-area">
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
	<!-- Latest Blog Area Start Here -->
        <div class="latest-blog-area mt-5 mb-5">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Latest plans</h2>
                            <div class="desc-content">
                                <p>If you want to know about the organic product then keep an eye on our blog.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-custom">
                        <div class="obrien-slider" data-slick-options='{
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": false,
                        "dots": false
                        }' data-slick-responsive='[
                        {"breakpoint": 1200, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 768, "settings": {
                        "slidesToShow": 1
                        }},
                        {"breakpoint": 576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>
                           
                            <?php  $sqlp=$fetchdata->select("tbl_plantinfo");
                            foreach($sqlp as $row) {
                                ?>
                           
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <a href="plandetails.php?id=<?php echo $row["plantId"]; ?>">
                                         <img src="admin/images/plan/<?php echo $row["plantImage"]; ?>" alt="Plan Image">
                                    </a>
                                </div>
                                <div class="single-blog-content position-relative" style="padding: 25px 0 0 0px;">
                                       <h2 class="post-title">
                                            <a href="plandetails.php?id=<?php echo $row["plantId"]; ?>"><?php echo ucwords($row["plantName"]); ?></a>
                                        </h2>
                                        <p class="desc-content"><?php echo ucwords($row["plantDescription"]); ?></p>
                                    </div>
                            </div>
								<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Blog Area End Here -->
		
        
    <?php include 'include/footer.php'; ?>
</body>

</html>