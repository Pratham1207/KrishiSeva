<?php
include_once("include/function.php");
$fetchdata=new DB_con();

$success_message = $error_message= '';
  
 if(isset($_POST["btnbook"]))  
 { 
        $insert_data = array(  
           'cId' => $_POST['txtcoldstoreid'],  
           'uId'=>$_SESSION['uid'],
           'startDate'  => $_POST['sdate'],
           'endDate'  => $_POST['edate'],
           'StoreType'  => $_POST['stype'],
           'Weight'  => $_POST['weight']      
      );  
      if($fetchdata->insert('tbl_coldstorage_booking', $insert_data))  
         $success_message = 'Your Store is book successful...';  
      else 
         $error_message = "Something went wrong. Please try again"; 
   }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coldstorage - <?php echo $project;  ?></title>
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

    <div class="shop-wrapper">
        <?php include 'include/header.php'; ?>
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Coldstorage</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Coldstorage</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Shop Main Area Start Here -->
        <div class="shop-main-area">
            <div class="container container-default custom-area">
                <div class="row flex-row-reverse">
				 <div class="col-lg-3 col-12 col-custom">
                        <!-- Sidebar Widget Start -->
                        <aside class="sidebar_widget widget-mt">
                            <div class="widget_inner">
                                <div class="widget-list widget-mb-1">
                                    <h3 class="widget-title">Search</h3>
                                    <div class="search-box">
                                        <div class="input-group">
										<form method="post">
                                            <input type="text" name="txtsearch" class="form-control" placeholder="Search Store by pincode" aria-label="Search Store by pincode">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" style="border-radius: 5px;width: 100px" type="submit" name="btnsave">
                                                    <i class="fa fa-search"></i> Search
                                                </button>
												 <a href="coldstorage.php" class="btn btn-outline-secondary" style="border-radius: 5px;width: 100px" >
                                                    <i class="fa fa-refresh"></i> Reset
                                                </a>
                                            </div>
										</form>	

                                    </div>
                                </div>
                             <br/><br/>
                             <?php if(isset($_SESSION['utype']) && $_SESSION['utype']!="Farmer") { ?>    
                              <a href="storeregister.php" class="obrien-button primary-btn" style="    font-size: 12px;">Register Your Store Now</a>
                              <?php } ?>       
                                
                              </div>
                        </aside>
                        <!-- Sidebar Widget End -->
                    </div>
                    <div class="col-lg-9 col-12 col-custom widget-mt">
                        <!--shop toolbar start
                        <div class="shop_toolbar_wrapper">
                            <div class="shop_toolbar_btn">
								
                                 </div>
                            <div class="shop-select">
                                <form class="d-flex flex-column w-100" action="#">
                                    <div class="form-group">
                                        <select class="form-control nice-select w-100">
                                            <option selected value="1">Alphabetically, A-Z</option>
                                            <option value="2">Sort by popularity</option>
                                            <option value="3">Sort by newness</option>
                                            <option value="4">Sort by price: low to high</option>
                                            <option value="5">Sort by price: high to low</option>
                                            <option value="6">Product Name: Z</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--shop toolbar end-->
                        <!-- Shop Wrapper Start -->
                        <span class="text-success">  
                     <?php echo (isset($success_message)) ? $success_message : ""; ?>  
                     </span> 
                      <span class="text-danger">  
                     <?php echo (isset($error_message)) ? $error_message : "";?>  
                     </span> 
                        <div class="row shop_wrapper grid_list">
						 <?php  if(isset($_REQUEST["btnsave"])) { 
									$sqlp=$fetchdata->select("tbl_coldstorage","pincode=".$_REQUEST["txtsearch"]);
								} else { 
									$sqlp=$fetchdata->select("tbl_coldstorage","isactive='Y'");
								}
									foreach($sqlp as $row){
								?>
                            <div class="col-custom product-area col-12">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="assets/images/product/coldstorage.jpg" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/coldstorage.jpg" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
										 <div class="buy-button mt-1">
                                <a href="#exampleModalCenterr" data-toggle="modal" class="btn obrien-button-3 black-button btnbooknow" data-id="<?php echo $row["cId"]; ?>" data-title="<?php echo ucwords($row["title"]); ?>" style="width: 258px;">Book Now</a>
                            </div>
                                    </div>
                                
                                   
                                    <div class="product-content-listview">
                                        <div class="product-title">
                                            <h4 class="title-2"> <?php echo ucwords($row["title"]); ?></h4>
                                        </div>
                                       <p class="desc-content"><?php echo $row["description"]; ?></p>
									   <p class="desc-content"><b> Address : </b><?php echo $row["address"]; ?></p>
									   <p class="desc-content"><i class="fa fa-phone"></i> : +91 <?php echo $row["phoneno"]; ?> |  <i class="fa fa-envelope"></i> : <?php echo $row["emailid"]; ?>  </p>
                                   
									</div>
                                </div>
                            </div>
									<?php } ?>
					    </div>
                        <br/><br/><br/>
                        <!-- Shop Wrapper End -->
                        <!-- Bottom Toolbar Start 
                        <div class="row">
                            <div class="col-sm-12 col-custom">
                                <div class="toolbar-bottom mt-30">
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
                                    <p class="desc-content text-center text-sm-right">Showing 1 - 12 of 34 result</p>
                                </div>
                            </div>
                        </div>
                        <!-- Bottom Toolbar End -->
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Shop Main Area End Here -->
    <?php include 'include/footer.php'; ?>
   
</body>

</html>