<?php
include_once("include/function.php");
$fetchdata=new DB_con();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daily Rates - <?php echo $project;  ?></title>
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
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->

    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>

    <div class="contact-wrapper">
       <?php include 'include/header.php'; ?>
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Dailyrates</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Dailyrates</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Wishlist main wrapper start -->
        <div class="wishlist-main-wrapper mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <!-- Wishlist Table Area -->
						<h3 id="tbltitle"></h3>
						<h6 id="tblsubtitle"></h6>
						<br/>
						<br/>
                        <div class="wishlist-table table-responsive">
                            <table class="table cell-border" width="95%" id="myTable">
                                <thead border="1">
                                    <tr >
                                        <th class="pro-thumbnail">Market</th>
                                        <th class="pro-title">District</th>
                                         <th class="pro-title">State</th>
										<th class="pro-price">commodity</th>
                                        <th class="pro-stock">Min Price</th>
                                        <th class="pro-cart">Max Price</th>
                                        <th class="pro-remove">Modal Price</th>
                                    </tr>
                                </thead>
                                <tbody id="ratelist">
                                  
                                </tbody>
                            </table>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist main wrapper end -->
         <?php include 'include/footer.php'; ?>
<script type="" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready( function () {
	
	
$.ajax({

url: 'https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070?api-key=579b464db66ec23bdd00000145d93f2c52ae4c176a6120c6cedc990a&format=json&offset=0&limit=150',
method: 'get',
dataType: 'json',
success: function (data){
 $("#tbltitle").html(data.title);
   $("#tblsubtitle").html('('+data.org[0]+','+data.org[1]+')');
   $('#myTable').DataTable( {
        dom: 'Blfrtip',  
        buttons: [
            'csv','pdf'
        ],   
        data: data.records,                         
        columns: [

              {"data": "market" ,"className": "text-left"},
              {"data": "district","className": "text-left" },
			  {"data": "state","className": "text-left" },
              {"data": "commodity" ,"className": "text-left"},
              {"data": "min_price" },
			  {"data": "max_price" },
			  {"data": "modal_price" },
                ]
  }); 
},
    error : function(request,error)
    {
        alert("Request: "+JSON.stringify(request));
    }
} );
} );

</script>

</body>

</html>