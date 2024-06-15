<?php
include_once("include/function.php");
$insertdata=new DB_con();
$success_message = $error_message= '';
  
 if(isset($_POST["btnsave"]))  
 { 
    
 		$insert_data = array(  
           'name' => mysqli_real_escape_string($insertdata->db,$_POST['con_name']),  
           'email'  => mysqli_real_escape_string($insertdata->db,$_POST['con_email']),
           'contact'  => mysqli_real_escape_string($insertdata->db,$_POST['con_content']),
           'msg'  => mysqli_real_escape_string($insertdata->db,$_POST['con_message']),
           'idate'  => date('Y-m-d')
      );  
      if($insertdata->insert('tbl_contact_message', $insert_data))  
         $success_message = 'we received your messsage we will contact you soon...';  
      else 
         $error_message = "Something went wrong. Please try again"; 
   
 }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact us - <?php echo $project;  ?></title>
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
                            <h3 class="title-3">contact Us</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Contact Us Area Start Here -->
        <div class="contact-us-area">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-custom">
                        <div class="contact-info-item">
                            <div class="con-info-icon">
                                <i class="ion-ios-location-outline"></i>
                            </div>
                            <div class="con-info-txt">
                                <h4>Our Location</h4>
                                <p>(800) 123 456 789 / (800) 123 456 789 info@krishportal.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-custom">
                        <div class="contact-info-item">
                            <div class="con-info-icon">
                                <i class="ion-iphone"></i>
                            </div>
                            <div class="con-info-txt">
                                <h4>Contact us Anytime</h4>
                                <p>Mobile: 012 345 678<br>Fax: 123 456 789</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-custom text-align-center">
                        <div class="contact-info-item">
                            <div class="con-info-icon">
                                <i class="ion-ios-email-outline"></i>
                            </div>
                            <div class="con-info-txt">
                                <h4>Support Overall</h4>
                                <p>Support24/7@krishportal.com <br> info@krishportal.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-custom">
						 <span class="text-success">  
                     <?php echo (isset($success_message)) ? $success_message : ""; ?>  
                     </span> 
                      <span class="text-danger">  
                     <?php echo (isset($error_message)) ? $error_message : "";?>  
                     </span> 
                        <form method="post" id="contact" class="contact-form">
                            <div class="comment-box mt-5">
                                <h5 class="text-uppercase">Get in Touch</h5>
                                <div class="row mt-3">
                                    <div class="col-md-6 col-custom">
                                        <div class="input-item mb-4">
                                            <input class="border rounded-0 w-100 input-area name" type="text" name="con_name" id="con_name" placeholder="Name">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 col-custom">
                                        <div class="input-item mb-4">
                                            <input class="border rounded-0 w-100 input-area" type="text" name="con_content" id="con_content" placeholder="Contact no." >
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="input-item mb-4">
                                            <input class="border rounded-0 w-100 input-area email" type="email" name="con_email" id="con_email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-custom">
                                        <div class="input-item mb-4">
                                            <textarea cols="30" rows="5" class="border rounded-0 w-100 custom-textarea input-area" name="con_message" id="con_message" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-custom mt-40">
                                        <button type="submit" name="btnsave" class="btn obrien-button primary-btn rounded-0 mb-0">Send A Message</button>
                                    </div>
                                    <p class="col-12 col-custom form-message mb-0"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us Area End Here -->
        <!-- Google Maps -->
        <div class="google-map-area">
            <div id="contacts" class="map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238132.63727541058!2d72.68220805203605!3d21.159462704479317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1644657731458!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <!-- Google Maps End -->
  <?php include 'include/footer.php'; ?>
 <script type="text/javascript">
     $( "#contact" ).validate({
        rules: {
               "con_name":{
                   required: true
               },
                "con_email":{
                   required: true,
                   email:true
               },
                "con_content":{
                   required: true,
                   number:true,
                   minlength:10,
                   maxlength:10
               },
                "con_message":{
                   required: true
               }  
       },
       messages: {
            "con_name": {
                required: "Please, enter a name"
            },
            "con_email": {
                required: "Please, enter a email",
                email: "Please enter valid email"
            },
            "con_content": {
                required: "Please, enter a contact no",
                number:"Please enter digits only",
                minlength:"Please enter valid number",
                maxlenght:"Please enter valid number"
            },
            "con_message": {
                required: "Please, enter a message"
            },
       }

   });
 </script>
</body>

</html>