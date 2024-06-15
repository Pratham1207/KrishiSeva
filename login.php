<?php
include_once("include/function.php");
$insertdata=new DB_con();
 $success_message = $error_message= '';
  
 if(isset($_POST["btnsave"]))  
 {  
      $email=$_POST['txtmail'];  
      $pass=md5($_POST['txtpassword']);
      $res=$insertdata->Login($email,$pass);
      if($res=="success") { 
         $success_message = 'Your Login successfull...'; 
         header('location:my-account.php'); 
      }
      else 
         $error_message = $res;     
 }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - <?php echo $project;  ?></title>
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
                            <h3 class="title-3">Login-Register</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Login-Register</li>
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
                        <div class="login-register-wrapper">
                         <span class="text-success">  
                         <?php echo (isset($success_message)) ? $success_message : ""; ?>  
                         </span> 
                          <span class="text-danger">  
                         <?php echo (isset($error_message)) ? $error_message : "";?>  
                         </span> 
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Login</h2>
                                <p class="desc-content">Please login using account detail bellow.</p>
                            </div>
                            <form method="post">
                                <div class="single-input-item mb-3">
                                    <input type="email" placeholder="Email or Username" name="txtmail">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" placeholder="Enter your Password" name="txtpassword">
                                </div>
                                <div class="single-input-item mb-3">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <a href="#" class="forget-pwd mb-3">Forget Password?</a>
                                    </div>
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color" type="submit" name="btnsave">Login</button>
                                </div>
                                <div class="single-input-item">
                                    <a href="register.php">Creat Account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End Here -->
       
        <!-- Footer Area Start Here -->
        <?php include 'include/footer.php'; ?>

</body>

</html>