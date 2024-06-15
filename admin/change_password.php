<?php
session_start();
include_once 'check_session.php';
include_once 'connection.php';
$page = "Change Password";
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

              <title><?= $page; ?> -  <?= $project;?></title>

        <?php include_once './common_css.php'; ?>
        <?php include_once './common_datatables_css.php'; ?>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
        <link rel="stylesheet" href="./assets/plugin/lightview/css/lightview/lightview.css" />
        <link rel="stylesheet" href="./assets/plugin/modal/remodal/remodal.css" />
        <link rel="stylesheet" href="./assets/plugin/modal/remodal/remodal-default-theme.css" />
    <?php include_once './common_js.php'; ?>
    <body>
        <div class="main-menu">
            <?php include_once './sidemenu.php'; ?>
        </div>
        <!-- /.main-menu -->

        <?php include_once './header.php'; ?>

        <div id="wrapper">
            <div class="main-content">
                <div class="row small-spacing">
                    <div class="col-lg-3 col-xs-12"></div>
                    <div class="col-lg-6 col-xs-12">
					                                                    <?php
                                                    if (isset($_REQUEST["btnsubmit"])) {
                                                        $oldpass = $_REQUEST["txtoldpas"];
                                                        $query = "SELECT * from tbl_admin where admin_id='" . $_SESSION["userid"] . "'";
                                                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                                                        if ($result) {
                                                            if (mysqli_num_rows($result) > 0) {
                                                              
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    if ($row["password"] == $oldpass) {
                                                                        $query = "UPDATE tbl_admin SET password='" . $_REQUEST["txtcnfpass"] . "' where admin_id='" . $_SESSION["userid"] . "'";
                                                                        $res = mysqli_query($con,$query) or die(mysqli_error($con));
                                                                        if ($res) {
                                                                            ?>
                                                                            <div class="alert alert-success alert-dismissable alert-condensed">
                                                                                <span>Your password has been updated successfully</span>
                                                                            </div>                                                                                
                                                                            <?php
                                                                            echo "<script>window.location='logout.php';</script>";
                                                                        } else {
                                                                            createLog(mysqli_error($con), $query);
                                                                            ?>
                                                                            <div class="alert alert-error alert-dismissable alert-condensed">
                                                                                <span>There is an error in updating new password. Please try again!!!</span>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?> 
                                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                            <span>Old password does not match. Please try again!!!</span>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            } else {
                                                                ?>
                                                                <div id="divError" class="alert alert-danger alert-dismissable alert-condensed">
                                                                    <span id="spanErrorMsg">Old password does not match. Please try again!!!</span>
                                                                </div>
                                                                <?php
                                                            }
                                                        } else {
                                                            createLog(mysqli_error($con), $query);
                                                            ?>
                                                            <div id="divError" class="alert alert-danger alert-dismissable alert-condensed">
                                                                <span id="spanErrorMsg">Old password does not match. Please try again!!!</span>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>  
                        <div class="box-content card white">
                            <h4 class="box-title">Change Password</h4>
                            <!-- /.box-title -->
                            
                            <div class="card-content" id="myBox">
                         
                                <form id="myForm" name="myForm" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="add" name="action"/>                
                                 <div class="form-group">
                                        <label for="title">Old Password</label>
                                        <input type="text" class="form-control input-sm" id="txtoldpas" name="txtoldpas" placeholder="Old Password" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">New Password</label>
										 <input type="text" class="form-control input-sm" id="txtnewpass" name="txtnewpass" placeholder="New Password" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Confirm Password</label>
										 <input type="text" class="form-control input-sm" id="txtcnfpass" name="txtcnfpass" placeholder="Confirm Password" value="">
                                    </div>
                               
                                    
                                    <div class="form-group" style="text-align: right;">
                                    <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-success btn-xs waves-effect waves-light"> <i class="fa fa-check-square-o"></i> Submit</button> <button type="reset"  class="btn btn-danger btn-xs waves-effect waves-light"> <i class="fa fa-refresh"></i>  Reset</button>
                                         
                                    </div>
                                </form>
								
                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.box-content -->
                    </div>
                    <div class="col-lg-2 col-xs-12"></div>
                </div>                
            </div>
            <!-- /.main-content -->
        </div><!--/#wrapper -->
             
        <!-- Validator -->
        <script src="assets/scripts/jquery.validate.js"></script>
        <!-- Datepicker -->
        <script src="./assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="./assets/scripts/main.min.js"></script>
		<script src="assets/scripts/additional-methods.js"></script>
		<script src="assets/scripts/jquery.blockUI.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
				
					
                $("#lnkchangepass").addClass("current active"); 
				
                $("#myForm").validate({
                
                    rules: {
                         txtoldpas: "required",
				         txtnewpass: "required",
						  txtcnfpass: {
                            required : true,
                            equalTo : "#txtnewpass"
                        }
                    
                    },
                    messages: {
                        txtoldpas: "Old Password is required",
					    txtnewpass: "New Password is required",
						txtcnfpass: {
                            required : "Confirm password is required",
                            equalTo : "New password and confirm password must be same"
                        }
            
                    }
                });

                $("#btnsubmit").on("click", function() {
                    if (!$("#myForm").valid()) {
                        return false;
                    }
                });
				
	

            });
		
        </script>
    </body>
</html>