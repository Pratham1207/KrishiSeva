<?php
include_once("include/function.php");
$insertdata=new DB_con();
 $success_message = $error_message= '';
  
 if(isset($_POST["btnregister"]))  
 { 
    $email = $insertdata->isUserExist($_POST['txtmail']);   
 	if(!$email){        
 		$insert_data = array(  
           'title' => $_POST['txtname'],  
           'phoneno'  => $_POST['txtcontact'],
           'emailid'  => $_POST['txtmail'],
           'address'  => mysqli_real_escape_string($insertdata->db,$_POST['txtadd']),
           'pincode'  => $_POST['txtpincode'],
           'description'  => mysqli_real_escape_string($insertdata->db,$_POST['txtdetails']),
           'isactive' => 'N',
           'uId'=>$_SESSION['uid']
      );  
      if($insertdata->insert('tbl_coldstorage', $insert_data))  
         $success_message = 'Your registration successful, We will approve you store soon...';  
      else 
         $error_message = "Something went wrong. Please try again"; 
    } else 
         $error_message = "Email Already Exist";          
 }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Store Register - <?php echo $project;  ?></title>
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
                            <h3 class="title-3">Cold Store Registration</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Store Registration</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Login Area Start Here -->
        <div class="login-register-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                   	 <span class="text-success">  
                     <?php echo (isset($success_message)) ? $success_message : ""; ?>  
                     </span> 
                      <span class="text-danger">  
                     <?php echo (isset($error_message)) ? $error_message : "";?>  
                     </span> 
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Register your Cold Storage</h2>
                                <p class="desc-content">Please Register using account detail bellow.</p>
                            </div>

                            <form  method="post" id="registration">
                                <div class="single-input-item mb-3">
                                    <input type="text" placeholder="Name" name="txtname">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="text" placeholder="Contact no" name="txtcontact">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="email" placeholder="Email" name="txtmail">
                                </div>
                                 <div class="single-input-item mb-3">
                                    <input placeholder="Address" name="txtadd">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="text" placeholder="Pincode" name="txtpincode">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input placeholder="More Details About Store" name="txtdetails">
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color" type="submit" name="btnregister">Register Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End Here -->
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
                "txtadd":{
                   required: true,
               },
                "txtpincode":{
                   required: true,
                   number:true,
                   minlength: 6,
                   maxlength: 6
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
            "txtadd": {
                required: "Please, enter a Address"
            },
            "txtpincode":{
                required: "Please, enter a pincode"
               }
       }

   });
 </script>
</body>

</html>