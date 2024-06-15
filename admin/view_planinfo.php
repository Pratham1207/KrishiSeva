<?php
session_start();
include_once 'check_session.php';
include_once 'connection.php';
$page = "Plants info List";
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
     <style>
	 .item-gallery{
	     margin-bottom: 0px;
   		 border: 0px solid #ffffff;
	 }
	 </style>
   </head>
    <body>
        <div class="main-menu">
            <?php include_once './sidemenu.php'; ?>
        </div>
        <!-- /.main-menu -->

        <?php include_once './header.php'; ?>





        <div id="wrapper">
            <div class="main-content">
                <div class="row small-spacing">
                    <div class="col-xs-12">
					  <div id="error" class="alert alert-danger" role="alert" style="display:none"> <strong>Oh snap!</strong> something went to wrong. please try again </div>
					
					  <div id="success" class="alert alert-success" role="alert"  style="display:none"> <strong>Done !</strong>  Plant info Updated Succesfully. </div>
					  <div id="delsuccess" class="alert alert-success" role="alert"  style="display:none"> <strong>Done !</strong>  Plant info Deleted Succesfully. </div>

                        <div class="box-content card white">
                            <h4 class="box-title">Plants Details</h4>
                            <!-- /.box-title -->
							<div class="dropdown js__drop_down">
							 <button type="type" id="btnmultidelete"  class="btn btn-icon btn-icon-right btn-danger btn-xs waves-effect waves-light" style="margin-left:10px;"><i class="ico fa fa-trash"></i> DELETE</button>
                                <a href="add_planinfo.php" class="btn btn-icon btn-icon-right btn-violet btn-xs waves-effect waves-light"><i class="ico fa fa-plus"></i> Add New</a>
                            </div>
                            <div class="card-content">
							
                                <div id="mytabledata" class="table-responsive">

                                </div>
								

                            </div>
						</div>
                        <!-- /.box-content -->
                    </div>
                    <!-- /.col-lg-6 col-xs-12 -->
                </div>
                <!-- /.row small-spacing -->

            </div>



<div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	<form method="post">
	<div class="remodal-content">
		<h2 id="modal1Title">Delete</h2>
		<p id="modal1Desc">
		Are you sure want to delete ?
		</p>
		<input type="hidden" name="memberid" id="memid"/>
	</div>

	<button data-remodal-action="confirm" class="remodal-confirm confrm">Yes</button>
	<button data-remodal-action="cancel" class="remodal-cancel">No</button>
	</form>
</div>

<div class="remodal" data-remodal-id="allremodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	<form method="post">
	<div class="remodal-content">
		<h2 id="modal1Title">Delete</h2>
		<p id="modal1Desc">
		Are you sure want to delete ?
		</p>
		<input type="hidden" name="Allmemberid[]" id="allmemid"/>
	</div>

	<button data-remodal-action="confirm" class="remodal-confirm allconfrm">Yes</button>
	<button data-remodal-action="cancel" class="remodal-cancel">No</button>
	</form>
</div>

            <!-- /.main-content -->
        </div><!--/#wrapper -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Plan Details</h4>
			</div>
			<form id="myForm" name="myForm" method="post" enctype="multipart/form-data">

			<div class="modal-body">
				                <input type="hidden" value="update" name="action"/>
								           <input type="hidden" id="txtcid" name="txtcid"/>
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

			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-danger btn-xs waves-effect waves-light" data-dismiss="modal">Close</button>
			  <button type="submit" id="btnsubmit" name="btnsubmit"  class="btn btn-success btn-xs waves-effect waves-light">Save Changes</button>
			</div>
			 </form>
		</div>
	</div>
</div>

<?php include_once './common_datatables_js.php'; ?>


	    <script src="assets/scripts/main.min.js"></script>
		<script src="assets/scripts/jquery.validate.js"></script>
        <script src="assets/scripts/additional-methods.js"></script>
		<script src="assets/scripts/jquery.blockUI.js"></script>
		<script>
		$(document).on("click",'#checkAl',function(){
			$('input:checkbox').not(this).prop('checked', this.checked);
		});
</script>
		<script type="text/javascript">


		    $(document).on("click","#btnmultidelete",function(){
				var arr = new Array();

				  $(".checkboxtable:checked").each(function () {
					arr.push($(this).val());
				  });
				$("#allmemid").val(arr);
				if($("#allmemid").val().trim()!="")
				{
					var inst = $('[data-remodal-id=allremodal]').remodal();
					 inst.open();
				} else {
					alert("Please select at least one checkbox");
				}
			});
			
	$(document).on('click','.allconfrm',function(){

     var del_id=$("#allmemid").val();

        $.ajax({
            type:'POST',
            url:'json/planinfo_list.php',
            data:{'delall':del_id,"action":"multiDelete"},
            success: function(data){
                 if(data=="YES"){
				   $("#error").hide();
				  $("#delsuccess").show();
				  $('#delsuccess').delay(1000).fadeOut('slow');
				 fill_data();
                 }else{
                  $("#error").show();
				    $("#delsuccess").hide();
                 }
             }

            });

  });



function fill_data(){

	$.ajax({
              type: "Post",
              url: "json/planinfo_list.php",
              data:{"action":"List"},
			  async: false,
              success: function(data) {
                    var obj = $.parseJSON(data);
                    var result="";
					result += "<table id='tabledata' class='table table-striped table-bordered display' style='width:100%'>";
                    result += "<thead>";
                    result += "<tr><th style='width:5%'><input type='checkbox' id='checkAl'> All</th>";
					result += "<th>Name</th>";
					result += "<th>Type</th>";
					result += "<th>Season</th>";
					result += "<th>Distance</th>";
					result += "<th>Action</th>";
                    result += "</tr>";
                    result += "</thead>";
					result += "<tbody>";

					$.each(obj, function() {
					     result += "<tr><td><input type='checkbox'  class='checkboxtable'  name='check[]' value='"+this['plantDetailId']+"' ></td>";
					 result += "<td>"+ this['plantName'] +"</td>";
					 result += "<td>"+ this['plantSubType'] +"</td>";
					 result += "<td>"+ this['plantBestSeason'] +"</td>";
					 result += "<td>"+ this['plantDistance'] +"</td>";

						 result += "<td><a href='plan_details.php?id="+this['plantDetailId']+"' class='btn btn-xs btn-warning waves-effect waves-light'><i class='ico fa fa-eye'></i></a> &nbsp;<a onClick='updatedata("+this['plantDetailId']+")' class='btn btn-xs btn-info waves-effect waves-light btnupd' data-toggle='modal' data-target='#myModal'><i class='ico fa fa-edit'></i></a> <a onClick='deldata("+this['plantDetailId']+")' class='btn btn-xs btn-danger waves-effect waves-light btndel' data-remodal-target='remodal'><i class='ico fa fa-trash'></i></a></td>";

						 result += "</tr>";

                    });
					result += "</tbody>";
					result += "<tfoot>";
                    result += "<tr><th>&nbsp;</th>";
                    result += "<th>Name</th>";
					result += "<th>Type</th>";
					result += "<th>Season</th>";
					result += "<th>Distance</th>";
					result += "<th>Action</th>";
                    result += "</tr>";
                    result += "</tfoot>";

					$("#mytabledata").html(result);

					

              }
        });

		$("#tabledata").DataTable();
      }



				function updatedata(s)
				{
          $('#matInputFile').val("");
		  			var catid=s;
					$.ajax({
					  type: "Post",
					  url:'json/planinfo_list.php',
					  data:{'plantId':catid,"action":"getUpdate"},
					  async: false,
					  success: function(data) {
					  var obj = $.parseJSON(data);

						   $('#txtcid').val(obj[0].plantDetailId);
						   $('#plantId').val(obj[0].plantId);
						   $('#SubType').val(obj[0].plantSubType);
						   $('#BestSeason').val(obj[0].plantBestSeason);
						   $('#Distance').val(obj[0].plantDistance);
						   $('#fertilizerId').val(obj[0].fertilizerId);
						   $('#fertilizerTime').val(obj[0].fertilizerTime);
						   $('#tempreture').val(obj[0].tempreture);
						   $('#water').val(obj[0].water);
						   $('#soilId').val(obj[0].soilId);
						   $('#pestId').val(obj[0].pestId);
						   $('#growthTime').val(obj[0].growthTime);
						   $('#warmId').val(obj[0].warmId);
						  
					  }
					  });

				}



			function deldata(s)
			{
				var mid=s;
				$("#memid").val(mid);

			}
$(document).on('click','.confrm',function(){

     var del_id=$("#memid").val();

        $.ajax({
            type:'POST',
            url:'json/planinfo_list.php',
            data:{'del_id':del_id,"action":"singleDelete"},
            success: function(data){
                 if(data=="YES"){
				   $("#error").hide();
				  $("#delsuccess").show();
				  $('#delsuccess').delay(1000).fadeOut('slow');
                  fill_data();
                 }else{
                  $("#error").show();
				    $("#delsuccess").hide();
                 }
             }

            });

  });

		</script>

		<script type="text/javascript">

		$(document).ready(function() {
            $("#lnkservices").addClass("current");
			$("#services").addClass("current active");

			fill_data();

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

				$("#myForm").on('submit', (function(e) {

								$('#myBox').block({
											message: '<img src="assets/images/loader.gif" style="width:35%"/>',
											css: {backgroundColor: 'transparent', border: 'none'}
										})

				e.preventDefault();
				    $.ajax({
							url: 'json/planinfo_list.php',
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
							 //console.log(data);
								var d = JSON.parse(data);
								if (d.msg == "Success") {
								  $("#error").hide();
								  $("#success").show();
								  $('#success').delay(1000).fadeOut('slow');
								  $("#myModal").modal('hide');
								  $('#myBox').unblock();
								    fill_data();
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

				}));
	    });





        </script>
			<script src="./assets/plugin/lightview/js/lightview/lightview.js"></script>
			<script src="./assets/plugin/modal/remodal/remodal.min.js"></script>

    </body>
</html>
