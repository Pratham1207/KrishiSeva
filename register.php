<?php
include_once("include/function.php");
$insertdata=new DB_con();
 $success_message = $error_message= '';
  
 if(isset($_POST["btnregister"]))  
 { 
    $email = $insertdata->isUserExist($_POST['txtmail']);   
 	if(!$email){        
 		$insert_data = array(  
           'uName' => $_POST['txtmail'],  
           'name'  => $_POST['txtname'],
           'uPassword'  => md5($_POST['txtcpassword']),
           'uPhoneNumber'  => $_POST['txtcontact'],
           'date'  => date('Y-m-d'),
           'uType'=> $_POST['txttype']
      );  
      if($insertdata->insert('tbl_user', $insert_data))  
         $success_message = 'Your registration successfull...';  
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
    <title>Register - <?php echo $project;  ?></title>
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
                   	 <span class="text-success">  
                     <?php echo (isset($success_message)) ? $success_message : ""; ?>  
                     </span> 
                      <span class="text-danger">  
                     <?php echo (isset($error_message)) ? $error_message : "";?>  
                     </span> 
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Create Account</h2>
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
                                    <input type="email" placeholder="Email or Username" name="txtmail">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" placeholder="Enter your Password" id="txtpasswprd" name="txtpasswprd">
                                </div>
 								                <div class="single-input-item mb-3">
                                    <input type="password" placeholder="Enter Confirm Password" name="txtcpassword">
                                </div>
                                <div class="single-select-item mb-3">
                                    <select name="txttype" style="background: #ffffff none repeat scroll 0 0;
    border: medium none rgba(0, 0, 0, 0);
    border-radius: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #1B1B1C;
    font-size: 14px;
    height: 40px;
    margin-bottom: 20px;
    padding-left: 10px;
    padding-right: 10px;
    width: 100%;">
                                        <option value="Farmer">Farmer</option>
                                        <option value="COwner">Coldstore Owner</option>
                                    </select>
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color" type="submit" name="btnregister">Register</button>
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
                "txtpasswprd":{
                   required: true,
                   minlength: 5
               },
                "txtcpassword":{
                   required: true,
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
            "txtpasswprd": {
                required: "Please, enter a password"
            },
            "txtcpassword":{
                required: "Please, enter a confirm password"
               }
       }

   });
 </script>
</body>

</html>