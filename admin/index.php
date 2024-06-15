<?php
session_start();
include_once 'connection.php';

if (isset($_SESSION["username"])) {
    echo "<script>window.location='view_product.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Login - <?php echo $project; ?></title>
        <link rel="stylesheet" href="./assets/styles/style.min.css" />
        <link rel="shortcut icon" href="./assets/images/favicon.ico"/>
        <!-- Waves Effect -->
        <link rel="stylesheet" href="./assets/plugin/waves/waves.min.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body>


        <div id="single-wrapper">


            
            <form id="frmLogin" name="frmLogin" method="post" class="frm-single"/>
            <div class="inside">
			    <div class="title">
				<!-- <h2>	
				<strong style="color: #89b140">Krish<span style="color: #dc3545">Portal</span>  </strong> 
				</h2> -->
                <img src="./assets/images/F1.png" />
				</div>


                <!-- /.title -->
                <!-- /.frm-title -->
                <?php
                if (isset($_REQUEST["btnlogin"])) {
                    $login = mysqli_query($con,"select * from tbl_admin where admin_name='" . $_REQUEST["txtUsername"] . "' and password='" . $_REQUEST["txtPassword"] . "'");

                    if (mysqli_num_rows($login) > 0) {
                        while ($row = mysqli_fetch_array($login)) {
                            if ($_REQUEST["txtUsername"] == $row["admin_name"] and $_REQUEST["txtPassword"] == $row["password"]) {
                                $_SESSION["username"] = $_REQUEST["txtUsername"];
								 $_SESSION["userid"] =$row["admin_id"];

                                ?>
                                <div class="alert alert-success" role="alert"> <strong>Please wait...</strong> </div>
                                <?php
                                echo "<script>window.location='view_slider.php';</script>";
                            } else {
                                ?>
                                <div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> Invalid Username or Password. </div>
                                <?php
                            }
                        }
                    } else {
                        ?>

                        <div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> Invalid Username or Password. </div>
                        <?php
                    }
                }
                ?>
                <div class="frm-input" style="margin-bottom: 10px;"><input type="text" id="txtUsername" name="txtUsername" placeholder="Username" required="required" class="frm-inp" /><i class="fa fa-user frm-ico"></i></div>
                <!-- /.frm-input -->
                <div class="frm-input" style="margin-bottom: 10px;"><input type="password" id="txtPassword" name="txtPassword" placeholder="Password" required="required" class="frm-inp" /><i class="fa fa-lock frm-ico"></i></div>
                <!-- /.frm-input -->
                <div class="clearfix margin-bottom-20">
                    <!--<div class="pull-right"><a href="#" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
                      -->
                </div>
                <!-- /.clearfix -->
                <button type="submit" id="btnlogin" name="btnlogin" class="frm-submit" style="background: #89b140">Login<i class="fa fa-arrow-circle-right"></i></button>
            </div>
            <!-- .inside -->
        </form>
        <!-- /.frm-single -->
    </div><!--/#single-wrapper -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="assets/script/html5shiv.min.js"></script>
            <script src="assets/script/respond.min.js"></script>
    <![endif]-->
    <!--
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/scripts/jquery.min.js"></script>
    <script src="./assets/scripts/modernizr.min.js"></script>
    <script src="./assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/plugin/nprogress/nprogress.js"></script>
    <script src="./assets/plugin/waves/waves.min.js"></script>
    <!-- Validator -->
    <script src="assets/scripts/jquery.validate.js"></script>
    <script src="./assets/scripts/main.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#frmLogin").validate({
                rules:{
                    txtUsername : "required",
                    txtPassword : "required"
                },
                messages:{
                    txtUsername : "Username is required",
                    txtPassword : "Password is required"
                }
            });

            $("#btnlogin").on("click",function(){
                if(!$("#frmLogin").valid()){
                    return false;
                }
            });
        });
    </script>
</body>
</html>
