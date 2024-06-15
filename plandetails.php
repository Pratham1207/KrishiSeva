<?php
include_once("include/function.php");
$fetchdata=new DB_con();
$success_message = $error_message= '';
  
 if(isset($_POST["btncomment"]))  
 { 
        $insert_data = array(  
           'plantid ' => $_POST['id'],  
           'uId'=>$_SESSION['uid'],
           'fqText'=>$_POST['txttext']
                
      );  
      if($fetchdata->insert('tbl_forum', $insert_data))  
         $success_message = 'Your comment is added successful...';  
      else 
         $error_message = "Something went wrong. Please try again"; 
   }

if(isset($_POST["btnreply"]))  
 { 
        $insert_data = array(  
           'fqId ' => $_POST['fqId'],  
           'uId'=>$_SESSION['uid'],
           'qAnswer'=>$_POST['txtreply']
                
      );  
      if($fetchdata->insert('tbl_forumanswer', $insert_data))  
         $success_message = 'Your comment is added successful...';  
      else 
         $error_message = "Something went wrong. Please try again"; 
   }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Plant info - <?php echo $project;  ?></title>
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
                            <h3 class="title-3">Plant Details </h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Plant Details</li>
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
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-12 col-custom widget-mt">
                        <!-- Blog Details wrapper Area Start -->
                        
                        <div class="blog-post-details">
                            <!-- <figure class="blog-post-thumb mb-5">
                                <img src="admin/images/plan/<?php echo $row["plantImage"]; ?>" alt="<?php echo ucwords($row["plantName"]); ?>">
                            </figure> -->
                        <?php 
                                $sqlp=$fetchdata->Plantinfo($_REQUEST["id"]);
                                foreach($sqlp as $row){
                        ?>
                            <section class="blog-post-wrapper product-summery">
                                <div class="section-content">
                                    <h2 class="title-1 mb-3"><?php echo ucwords($row["plantSubType"]); ?></h2>
                                    <p class="mb-1"><?php echo ucwords($row["plantDescription"]); ?></p>
                                    
                                    <table width="100%">
                                       <tr>
                                        <th>Seasion</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["plantBestSeason"]); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>Plant Distance</th>
                                        <td><p class="mb-1"><p class="mb-1"><?php echo ucwords($row["plantDistance"]); ?></p>
                                    </p></td>
                                    </tr> 
                                     <tr>
                                        <th>Fertilizer</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["fertilizerName"]); ?></p>
                                    </td>
                                    </tr> 
                                     <tr>
                                        <th>Fertilizer Time</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["fertilizerTime"]); ?></p>
                                    </td>
                                    </tr> 
                                     <tr>
                                        <th>Tempreture</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["tempreture"]); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>Soil</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["soilName"]); ?></p>
                                    </td>
                                    </tr> 
                                     <tr>
                                        <th>Pesticide</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["pestName"]); ?></p></td>
                                    </tr> 
                                    <tr>
                                        <th>Pesticide Dose</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["pestDose"]); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>GrowthTime</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["growthTime"]); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>warm</th>
                                        <td><p class="mb-1"><?php echo ucwords($row["warmName"]); ?></p></td>
                                    </tr> 

                                    </table>
                                    
                                    
                                </div>
                                <br/>
                            </section>
                            <hr/>
                        <?php } ?>
                        <section class="blog-post-wrapper product-summery">
                                    <div class="share-article">
                                        
                                    <span class="left-side">
                                        <?php if($fetchdata->oldervalue($_REQUEST["id"])!="" && $fetchdata->oldervalue($_REQUEST["id"])>0) {?>
                                    <a href="plandetails.php?id=<?php echo $fetchdata->oldervalue($_REQUEST["id"]); ?>"> <i class="fa fa-long-arrow-left"></i> Older Post</a>
                                <?php }  ?>
                                </span>
                            
                                    <span class="right-side">
                                         <?php if($fetchdata->newvalue($_REQUEST["id"])>0 && $fetchdata->newvalue($_REQUEST["id"])!="") {?>
                                   <a href="plandetails.php?id=<?php echo $fetchdata->newvalue($_REQUEST["id"]);?>">Newer Post <i class="fa fa-long-arrow-right"></i></a>
                                 <?php } ?>
                                </span>
                           
                                </div>
                               <br/>
                                <div class="comment-area-wrapper mt-5">
                                    <div class="comments-view-area">
                                        <h3 class="mb-5"><?php echo count($fetchdata->plantcomment($_REQUEST["id"]));?> Comments</h3>
                                        <?php $sqlp=$fetchdata->plantcomment($_REQUEST["id"]);
                                        foreach($sqlp as $row){
                                        ?>
                                        <div class="single-comment-wrap mb-4 d-flex">
                                            <figure class="author-thumb">
                                                <a href="#">
                                                    <img src="assets/images/review/1.jpg" alt="Author">
                                                </a>
                                            </figure>
                                            <div class="comments-info">
                                                <p class="mb-2"><?php echo ucwords($row["fqText"]); ?></p>
                                                <div class="comment-footer d-flex justify-content-between">
                                                    <a href="#" class="author"><strong><?php echo ucwords($row["name"]); ?></strong> - <?php echo date("M d,Y",strtotime($row["date"])); ?></a>
                    
                                                   
                                                </div>
                                                <?php if(isset($_SESSION['uid']) && $_SESSION['uid']!="") {?>
                            
                        <form method="post">
                            <div class="comment-box">
                                <div class="row">
                                    <div class="col-12 col-custom">
                                        <div class="input-item mt-4 mb-4">
                                            <input type="hidden" name="fqId" value="<?php echo $row["fqId"]; ?>">
                                            <input type="text" name="txtreply" class="border rounded-0 input" placeholder="Reply" required="required">
                                            <button type="submit" name="btnreply" class="btn-reply"> <i class="fa fa-reply"></i> Reply</button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-custom mt-040">
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                                            </div>
                                        </div>
                                        <?php $sqlp=$fetchdata->comments($row["fqId"]);
                                        foreach($sqlp as $row){
                                        ?>
                                        <div class="single-comment-wrap mb-4 comment-reply d-flex">
                                            <figure class="author-thumb">
                                                <a href="#">
                                                    <img src="assets/images/review/1.jpg" alt="Author">
                                                </a>
                                            </figure>
                                            <div class="comments-info">
                                                <p class="mb-2"><?php echo $row["qAnswer"]?></p>
                                                <div class="comment-footer d-flex justify-content-between">
                                                     <a href="#" class="author"><strong><?php echo ucwords($row["name"]); ?></strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                        <?php } ?>
                                   
                                    </div>
                                </div>
                    
                        </section>
                        </div>
                        <!-- Blog Details Wrapper Area End -->
                        <!-- Blog Comments Area Start -->
                        <?php if(isset($_SESSION['uid']) && $_SESSION['uid']!="") {?>
                             <span class="text-success">  
                     <?php echo (isset($success_message)) ? $success_message : ""; ?>  
                     </span> 
                      <span class="text-danger">  
                     <?php echo (isset($error_message)) ? $error_message : "";?>  
                     </span> 
                        <form method="post">
                            <div class="comment-box">
                                <h3>Leave A Comment</h3>
                                <div class="row">
                                    <div class="col-12 col-custom">
                                        <div class="input-item mt-4 mb-4">
                                            <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>">
                                            <textarea cols="30" rows="5" name="txttext" class="border rounded-0 w-100 custom-textarea input-area" placeholder="Message" required="required"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-custom mt-40">
                                        <button type="submit" name="btncomment" class="btn obrien-button primary-btn rounded-0 w-100">Post comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                        <!-- Blog Comments Area End -->
                    </div>
                    <div class="col-lg-3 col-12 col-custom">
                        <!-- Sidebar Widget Start -->
                        <aside class="sidebar_widget mt-no-text">
                            <div class="widget_inner">
                                
                                <div class="widget-list widget-mb-4">
                                    <h3 class="widget-title">Recent Plants</h3>
                                    <div class="sidebar-body">
                                       
                                        <?php $sqlp=$fetchdata->Recentplant($_REQUEST["id"]);
                                        foreach($sqlp as $row){
                                        ?>
                                        <div class="sidebar-product align-items-center">
                                            <a href="product-details.html" class="image">
                                                <img src="admin/images/plan/<?php echo $row["plantImage"]; ?>" alt="<?php echo ucwords($row["plantName"]); ?>">
                                            </a>
                                            <div class="product-content">
                                                <div class="product-title">
                                                    <h4 class="title-2"> <a href="plandetails.php?id=<?php echo $row["plantId"]; ?>"><?php echo ucwords($row["plantName"]); ?></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- Sidebar Widget End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Main Area End Here -->
      <?php include 'include/footer.php'; ?>

</body>

</html>