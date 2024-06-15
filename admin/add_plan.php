<?php
session_start();
include_once 'check_session.php';
include_once 'connection.php';
$page = "Plan";
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
        <!-- Datepicker -->
        <link rel="stylesheet" href="./assets/plugin/datepicker/css/bootstrap-datepicker.min.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
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
					
					  <div id="error" class="alert alert-danger" role="alert" style="display:none"> <strong>Oh snap!</strong> something went to wrong. please try again </div>
                              
					  <div id="success" class="alert alert-success" role="alert"  style="display:none"> <strong>Done !</strong>  <?= $page; ?> Added Succesfully. </div>
                              
                        <div class="box-content card white">
                            <h4 class="box-title">Add <?= $page; ?> Details</h4>
                            <!-- /.box-title -->
                            <div class="dropdown js__drop_down">
                                <a href="view_plan.php" class="btn btn-info btn-xs waves-effect waves-light">View List</a>
                            </div>
                            <div class="card-content" id="myBox">
                         
                                <form id="myForm" name="myForm" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="add" name="action"/>                
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control input-sm" id="txttitle" name="txttitle" placeholder="Title" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Description</label>
                                        <textarea class="form-control input-sm" id="txtdesc " name="txtdesc" placeholder="Description" resize="false" style="height: 80px;"></textarea>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label for="matInputFile">Image</label>
                               
                                            <input type="file" id="matInputFile" name="image" class="form-control input-sm">
                                                                           
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
				
					
                $("#lnkservices").addClass("current");                
            	$("#services").addClass("current active"); 
				
                $("#myForm").validate({
                
                    rules: {
                        txttitle: "required",
						image: {
                            extension: "jpg,jpeg,png",
                        },
                        txtdesc: "required"
                    
                    },
                    messages: {
                        txttitle: "Title is required",
						 image: {
                            extension: "Upload only image of type .jpg or .jpeg or .png"
                        },
                        txtdesc: "Description is required"
           
                    }
                });

                $("#btnsubmit").on("click", function() {
                    if (!$("#myForm").valid()) {
                        return false;
                    }
                });

                $("#btnupdate").on("click", function() {
                    if (!$("#myForm").valid()) {
                        return false;
                    }
                });
				
				
				
				
		$("#myForm").on('submit', (function(e) {
		  					$('#myBox').block({
											message: '<img src="assets/images/loader.gif" style="width:35%"/>',
											css: {backgroundColor: 'transparent', border: 'none'}
										}) 
					e.preventDefault();
					if ($("#myForm").valid()) {
					   
						$.ajax({
							url: 'json/plan_list.php',
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
							console.log(data);
								var d = JSON.parse(data);
								if (d.msg == "Success") {
								  $("#error").hide(); 
								  $("#success").show(); 
								  $( '#myForm' ).each(function(){
   								 	this.reset();
									});
								 $('#myBox').unblock();
								
								}
								else {
								   $("#error").show();
								    $("#success").hide(); 
									$('#myBox').unblock();
								}
							},
							error: function() {
								 $('#myBox').unblock();
							}
						});
					}
				}));

            });
		
        </script>
    </body>
</html>