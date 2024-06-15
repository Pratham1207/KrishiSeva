<?php
include_once("include/function.php");
$insertdata=new DB_con();
$user=$insertdata->userinfo();
if(isset($_POST["btnregister"]))  
 { 
    if($_POST['txtcurrent']!="")
    {
        $cpas = $insertdata->isCurrentPass(md5($_POST['txtcurrent']));   
        if($cpas){        
            $update_data = array(  
               'uName' => $_POST['txtmail'],  
               'name'  => $_POST['txtname'],
               'uPassword'  => md5($_POST['txtcpassword']),
               'uPhoneNumber'  => $_POST['txtcontact'],
          );
           $where_condition = array('uId' =>  $_SESSION['uid']);  
          if($insertdata->update('tbl_user', $update_data,$where_condition))  
             $success_message = 'Your data upteded successfull...';  
          else 
             $error_message = "Something went wrong. Please try again"; 

        } else {
            $error_message = "Current Password does not match. Please try again";
        }
        
    } else {
         $update_data = array(  
               'uName' => $_POST['txtmail'],  
               'name'  => $_POST['txtname'],
               'uPhoneNumber'  => $_POST['txtcontact'],
          ); 
         $where_condition = array('uId' =>  $_SESSION['uid']);  
          if($insertdata->update('tbl_user', $update_data,$where_condition))  
             $success_message = 'Your data upteded successfull...';  
          else 
             $error_message = "Something went wrong. Please try again"; 
    }
      
 }
 if(isset($_REQUEST["status"]))
 {
 	$status=($_REQUEST["status"]=="A") ? "Approve":"Rejected";
 	$update_data = array(  
               'status' => $status,  
          	 ); 
	$Id=$_REQUEST["Id"];
	$where_condition = array('BookingId' =>  $Id); 
	  if($insertdata->update('tbl_coldstorage_booking', $update_data,$where_condition))  
            echo "<script>window.location='my-account.php';</script>";
          else 
             $error_message = "Something went wrong. Please try again";  

 }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Account - <?php echo $project;  ?></title>
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

    <div class="contact-wrapper">
      <?php include 'include/header.php'; ?>
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">My Account</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- my account wrapper start -->
        <div class="my-account-wrapper mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-12 col-custom">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-custom">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                            Dashboard</a>
                                       <!--  
                                        <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i>
                                            Download</a>
                                        <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
                                            Payment
                                            Method</a>-->
                                        <?php if($_SESSION['utype']!="Farmer") { ?>    
                                            <a href="#orders" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                            Cold Stores</a> 
                                             <a href="#books" data-toggle="tab"><i class="fa fa-book"></i>
                                            Booked Stores</a> 
                                        <?php } else { ?>
                                             <a href="#orders" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                           Booking info</a> 
                                        <?php } ?>
                                        <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                                            Details</a>
                                        <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8 col-custom">
                                     <span class="text-success">  
                     <?php echo (isset($success_message)) ? $success_message : ""; ?>  
                     </span> 
                      <span class="text-danger">  
                     <?php echo (isset($error_message)) ? $error_message : "";?>  
                     </span> 
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>
                                                <div class="welcome">
                                                    <p>Hello, <strong><?php echo ucwords($_SESSION['username']); ?></strong></p>
                                                </div>
                                                <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
<?php if($_SESSION['utype']!="Farmer") { ?>  
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Cold Store <a href="storeregister.php" class="btn obrien-button-2 primary-color rounded-0" style="float: right;"><i class="fa fa-file mr-2"></i>New Register</a></h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Contact</th>
                                                                <th>Address</th>
                                                                <th>Details</th>
                                                                <th>Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                        <?php      
                                                        $sqlp=$insertdata->select("tbl_coldstorage","uId='".$_SESSION['uid']."'");
                                                        foreach($sqlp as $row) {
                                                        ?>

                                                            <tr>
                                                                <td><?php echo ucwords($row["title"]); ?></td>
                                                                <td><?php echo $row["phoneno"]."<br/>".$row["emailid"]; ?></td>
                                                                <td><?php echo $row["address"]."<br/>".$row["phoneno"]; ?></td>
                                                                <td><?php echo $row["description"]; ?></td>
                                                                <td><?php echo ($row["isactive"]=="Y")? "Approve":"Pending" ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="books" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Booked Store </h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Farmer Name</th>
                                                                <th>Name</th>
                                                                <th>StartDate</th>
                                                                <th>EndDate</th>
                                                                <th>Store Type</th>
                                                                <th>Weight</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                        <?php      
                                                        $sqlp=$insertdata->selectColDstoreBooked();
                                                        foreach ($sqlp as $row){
                                                        ?>
                                                            <tr>
                                                            	 <td><?php echo ucwords($row["name"])."<br/>".$row["uPhoneNumber"]; ?></td>
                                                                <td><?php echo ucwords($row["title"]); ?></td>
                                                                <td><?php echo date("M d,Y",strtotime($row["startDate"])); ?></td>
                                                                <td><?php echo date("M d,Y",strtotime($row["endDate"])); ?></td>
                                                                <td><?php echo $row["StoreType"]; ?></td>
                                                                <td><?php echo $row["Weight"]; ?></td>
                                                                <td> <?php if($row["status"]=="Pending") { ?>
                                                                	<a href="my-account.php?status=A&Id=<?=$row["BookingId"]; ?>" class="btn obrien-button-2 rounded-0" style="color: #ffffff;background-color: #078734">Approve</a> | <a href="my-account.php?status=R&Id=<?=$row["BookingId"]; ?>" class="btn obrien-button-2 rounded-0" style="color: #ffffff;background: #df2b2b;">Rejected</a>
                                                                <?php } else { 
                                                                		echo $row["status"];
                                                                 } ?>
                                                                
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <?php } else { ?>
                                             <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Cold Store Booking Info</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Status</th>
                                                                <th>Name</th>
                                                                <th>StartDate</th>
                                                                <th>EndDate</th>
                                                                <th>Store Type</th>
                                                                <th>Weight</th>
                                                                <th>Book Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                        <?php      
                                                        $sqlp=$insertdata->select("tbl_coldstorage_booking","uId='".$_SESSION['uid']."'");
                                                        foreach($sqlp as $row) {
                                                             $sql=$insertdata->select("tbl_coldstorage","cId='".$row['cId']."'");
                                                        ?>
                                                            <tr>
                                                                <td><?php echo ucwords($row["status"]); ?></td>
                                                                <td><?php echo ucwords($sql[0]["title"]); ?></td>
                                                                <td><?php echo date("M d,Y",strtotime($row["startDate"])); ?></td>
                                                                <td><?php echo date("M d,Y",strtotime($row["endDate"])); ?></td>
                                                                <td><?php echo $row["StoreType"]; ?></td>
                                                                <td><?php echo $row["Weight"]; ?></td>
                                                                <td><?php echo date("M d,Y h:i:s ",strtotime($row["createDate"])); ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <?php } ?>    
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="download" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Downloads</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Date</th>
                                                                <th>Expire</th>
                                                                <th>Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Haven - Free Real Estate PSD Template</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Yes</td>
                                                                <td><a href="#" class="btn obrien-button-2 primary-color rounded-0"><i class="fa fa-cloud-download mr-2"></i>Download File</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>HasTech - Profolio Business Template</td>
                                                                <td>Sep 12, 2018</td>
                                                                <td>Never</td>
                                                                <td><a href="#" class="btn obrien-button-2 primary-color rounded-0"><i class="fa fa-cloud-download mr-2"></i>Download File</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Payment Method</h3>
                                                <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Billing Address</h3>
                                                <address>
                                                    <p><strong>Alex Aya</strong></p>
                                                    <p>1355 Market St, Suite 900 <br>
                                                    San Francisco, CA 94103</p>
                                                    <p>Mobile: (123) 456-7890</p>
                                                </address>
                                                <a href="#" class="btn obrien-button-2 primary-color rounded-0"><i class="fa fa-edit mr-2"></i>Edit Address</a>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                    
                                                <h3>Account Details</h3>
                                                <div class="account-details-form">
                                                    <form method="post" id="registration">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="first-name" class="required mb-1">Name</label>
                                                                    <input type="text" id="txtname" name="txtname" placeholder="First Name" value="<?php echo $user["name"]; ?>"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="last-name" class="required mb-1">Contact No</label>
                                                                    <input type="text" id="txtcontact" name="txtcontact" placeholder="Contact no" value="<?php echo $user["uPhoneNumber"]; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-input-item mb-3">
                                                            <label for="email" class="required mb-1">Email Addres</label>
                                                            <input type="email" id="txtmail" name="txtmail" placeholder="Email Address" value="<?php echo $user["uName"]; ?>" />
                                                        </div>
                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="single-input-item mb-3">
                                                                <label for="current-pwd" class="required mb-1">Current Password</label>
                                                                <input type="password" id="current-pwd" placeholder="Current Password"  name="txtcurrent"/>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-custom">
                                                                    <div class="single-input-item mb-3">
                                                                        <label for="new-pwd" class="required mb-1">New Password</label>
                                                                        <input type="password" id="txtpasswprd" placeholder="New Password" name="txtpasswprd"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-custom">
                                                                    <div class="single-input-item mb-3">
                                                                        <label for="confirm-pwd" class="required mb-1">Confirm Password</label>
                                                                        <input type="password" name="txtcpassword" id="txtcpassword" placeholder="Confirm Password" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item single-item-button">
                                                            <button class="btn obrien-button primary-btn" name="btnregister" type="submit">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
       <?php include 'include/footer.php'; ?>
           <script type="text/javascript">
     $( "#registration" ).validate({
        rules: {
               "txtname":{
                   required: true
               },
                "txtmail":{
                   required: true,
                   email:true
               },
                "txtcontact":{
                   required: true,
                   number:true,
                   minlength:10,
                   maxlength:10
               },
                "txtpasswprd":{
                   minlength: 5
               },
                "txtcpassword":{
                   minlength: 5,
                   equalTo: "#txtpasswprd"
               }

       },
       messages: {
            "txtname": {
                required: "Please, enter a name"
            },
            "txtmail": {
                required: "Please, enter a email",
                email: "Please enter valid email"
            },
            "txtcontact": {
                required: "Please, enter a contact no",
                number:"Please enter digits only",
                minlength:"Please enter valid number",
                maxlenght:"Please enter valid number"
            },
          }

   });
 </script>
</body>

</html>