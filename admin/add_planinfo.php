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
                                <a href="view_planinfo.php" class="btn btn-info btn-xs waves-effect waves-light">View List</a>
                            </div>
                            <div class="card-content" id="myBox">
                         
                                <form id="myForm" name="myForm" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="add" name="action"/>     
                                <div class="form-group">
                                        <label for="Dose">Plant</label>
                                         <select class="form-control input-sm" id="plantId" name="plantId">
                                        <?php   
                                            $sql = @mysqli_query($con,"SELECT * from tbl_plantinfo");
                                                while($r = mysqli_fetch_assoc($sql)) { ?>
                                            <option value="<?php echo $r["plantId"]; ?>"><?php echo $r["plantName"]; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>  
                                    <div class="form-group">
                                        <label for="title">SubType</label>
                                        <input type="text" class="form-control input-sm" id="SubType" name="SubType" placeholder="Sub Type" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">BestSeason</label>
                                        <input type="text" class="form-control input-sm" id="BestSeason" name="BestSeason" placeholder="Best Season" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Distance</label>
                                        <input type="text" class="form-control input-sm" id="Distance" name="Distance" placeholder="PlantDistance" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="Dose">Fertilizer</label>
                                         <select class="form-control input-sm" id="fertilizerId" name="fertilizerId">
                                        <?php   
                                            $sql = @mysqli_query($con,"SELECT * from tbl_fertilizerinfo");
                                                while($r = mysqli_fetch_assoc($sql)) { ?>
                                            <option value="<?php echo $r["fertilizerId"]; ?>"><?php echo $r["fertilizerName"]; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>     
                                     <div class="form-group">
                                        <label for="title">fertilizer Time</label>
                                        <input type="text" class="form-control input-sm" id="fertilizerTime" name="fertilizerTime" placeholder="fertilizer Time" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Tempreture</label>
                                        <input type="text" class="form-control input-sm" id="tempreture" name="tempreture" placeholder="tempreture" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Water</label>
                                        <input type="text" class="form-control input-sm" id="water" name="water" placeholder="water" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="Dose">Pesticide</label>
                                         <select class="form-control input-sm" id="pestId" name="pestId">
                                        <?php   
                                            $sql = @mysqli_query($con,"SELECT * from tbl_pesticideinfo");
                                                while($r = mysqli_fetch_assoc($sql)) { ?>
                                            <option value="<?php echo $r["pestId"]; ?>"><?php echo $r["pestName"]; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>     
                                    <div class="form-group">
                                        <label for="Dose">soil</label>
                                         <select class="form-control input-sm" id="soilId" name="soilId">
                                        <?php   
                                            $sql = @mysqli_query($con,"SELECT * from tbl_soilinfo");
                                                while($r = mysqli_fetch_assoc($sql)) { ?>
                                            <option value="<?php echo $r["soilId"]; ?>"><?php echo $r["soilName"]; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>     
                                    <div class="form-group">
                                        <label for="Dose">warm</label>
                                         <select class="form-control input-sm" id="warmId" name="warmId">
                                        <?php   
                                            $sql = @mysqli_query($con,"SELECT * from tbl_warminfo");
                                                while($r = mysqli_fetch_assoc($sql)) { ?>
                                            <option value="<?php echo $r["warmId"]; ?>"><?php echo $r["warmName"]; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>              
                                    <div class="form-group">
                                        <label for="title">Growth Time</label>
                                        <input type="text" class="form-control input-sm" id="growthTime" name="growthTime" placeholder="growth Time" value="">
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
                        SubType: "required",
						BestSeason: "required",
                        Distance: "required",
                        fertilizerTime: "required",
                        tempreture: "required",
                        water: "required",
                        growthTime: "required",
                    
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
							url: 'json/planinfo_list.php',
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