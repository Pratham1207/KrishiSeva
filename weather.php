<?php
include_once("include/function.php");
$fetchdata=new DB_con();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Weather - <?php echo $project;  ?></title>
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

    <div class="blog-wrapper">
      <?php include 'include/header.php'; ?>
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Farming Advice</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Farming Advice</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Blog Main Area Start Here -->
        <div class="blog-main-area">
            <div class="container container-default custom-area">
			
			 <div class="row">
                    <div class="col-12 col-custom mt-no-text">
<!--<div id="weatherapi-weather-widget-2"></div><script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=165256&wid=2&tu=1&div=weatherapi-weather-widget-2' async></script><noscript><a href="https://www.weatherapi.com/weather/q/farmers-165256" alt="Hour by hour Farmers weather">10 day hour by hour Farmers weather</a></noscript><div id="weatherapi-weather-widget-2"></div><script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=165256&wid=2&tu=1&div=weatherapi-weather-widget-2' async></script><noscript><a href="https://www.weatherapi.com/weather/q/farmers-165256" alt="Hour by hour Farmers weather">10 day hour by hour Farmers weather</a></noscript> -->			
<div id="weatherapi-weather-widget-3"></div><script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=165256&wid=3&tu=1&div=weatherapi-weather-widget-3' async></script><noscript><a href="https://www.weatherapi.com/weather/q/farmers-165256" alt="Hour by hour Farmers weather">10 day hour by hour Farmers weather</a></noscript>	
	</div>
				</div>
				
				<div class="row">
                    <div class="col-12 col-custom mt-no-text">
                        <!-- Blog Wrapper Start -->
                        <div class="row">
						<?php $sqlp=$fetchdata->select("tbl_plantinfo");
								foreach($sqlp as $row){
								?>
                            <div class="col-lg-4 col-md-6 col-custom mb-4">
                                <div class="single-blog">
                                    <div class="single-blog-thumb">
                                        <a href="plandetails.php?id=<?php echo $row["plantId"]; ?>">
                                            <img src="admin/images/plan/<?php echo $row["plantImage"]; ?>" alt="Plan Image">
                                        </a>
                                    </div>
                                    <div class="single-blog-content position-relative" style="    padding: 25px 0 0 0px;">
                                       <h2 class="post-title">
                                            <a href="plandetails.php?id=<?php echo $row["plantId"]; ?>"><?php echo ucwords($row["plantName"]); ?></a>
                                        </h2>
                                        <p class="desc-content"><?php echo ucwords($row["plantDescription"]); ?></p>
                                    </div>
                                </div>
                            </div>
									<?php } ?>
                         
                            
                        </div>
                        <!-- Blog Wrapper End -->
                        <!-- Bottom Toolbar Start -->
                        <div class="row mb-no-text">
                            <div class="col-sm-12 col-custom">
                                <div class="toolbar-bottom mb-0">
                                    <nav class="pagination pagination-wrap mb-10 mb-sm-0">
                                        <ul class="pagination">
                                            <li class="disabled prev">
                                                <i class="ion-ios-arrow-thin-left"></i>
                                            </li>
                                            <li class="active"><a>1</a></li>
                                            <li>
                                                <a href="#">2</a>
                                            </li>
                                            <li class="next">
                                                <a href="#" title="Next >>"><i class="ion-ios-arrow-thin-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Bottom Toolbar End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Main Area End Here -->
         <?php include 'include/footer.php'; ?>

    <!-- Modal Area Start Here -->
    <div class="modal fade obrien-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                    <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 text-center">
                                <div class="product-image">
                                    <img src="assets/images/product/1.jpg" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title">Product dummy name</h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>1 Review</span>
                                        </div>
                                        <p class="desc-content">we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame bel...</p>
                                        <form class="d-flex flex-column w-100" action="#">
                                            <div class="form-group">
                                                <select class="form-control nice-select w-100">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                    <option>XL</option>
                                                    <option>XXL</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="quantity-with_btn">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="0" type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                            <div class="add-to_cart">
                                                <a class="btn obrien-button primary-btn" href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Area End Here -->

</body>

</html>