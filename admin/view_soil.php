<?php
session_start();
include_once 'check_session.php';
include_once 'connection.php';
$page = "Soil List";
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
		<title><?= $page; ?> - <?= $project;?></title>
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
					
					  <div id="success" class="alert alert-success" role="alert"  style="display:none"> <strong>Done !</strong>  Soil Updated Succesfully. </div>
					  <div id="delsuccess" class="alert alert-success" role="alert"  style="display:none"> <strong>Done !</strong>  Soil Deleted Succesfully. </div>

                        <div class="box-content card white">
                            <h4 class="box-title">Soil Details</h4>
                            <!-- /.box-title -->
							<div class="dropdown js__drop_down">
							 <button type="type" id="btnmultidelete"  class="btn btn-icon btn-icon-right btn-danger btn-xs waves-effect waves-light" style="margin-left:10px;"><i class="ico fa fa-trash"></i> DELETE</button>
                                <a href="add_soil.php" class="btn btn-icon btn-icon-right btn-violet btn-xs waves-effect waves-light"><i class="ico fa fa-plus"></i> Add New</a>
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
				<h4 class="modal-title" id="myModalLabel">Edit Soil Details</h4>
			</div>
			<form id="myForm" name="myForm" method="post" enctype="multipart/form-data">

			<div class="modal-body">
				                <input type="hidden" value="update" name="action"/>
								           <input type="hidden" id="txtcid" name="txtcid"/>
                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control input-sm" id="txttitle" name="txttitle" placeholder="Name" value="">
                                    </div>
                                   <div class="form-group">
                                        <label for="Dose">Ph</label>
                                        <input type="text" class="form-control input-sm" id="txtdose" name="txtdose" placeholder="Ph" value="">
                                    </div>
                                     <div class="form-group">
                                        <label for="desc">Description</label>
                                        <textarea class="form-control input-sm" id="txtdesc" name="txtdesc" placeholder="Description" resize="false" style="height: 80px;"></textarea>
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
            url:'json/soil_list.php',
            data:{'delall':del_id,"action":"multiDelete"},
            success: function(data){
                 if(data=="YES"){
				   $("#error").hide();
				   $("#delsuccess").show();
				   $('#delsuccess').delay(1000).fadeOut('slow');
				 fill_data();
                 } else {
                   $("#error").show();
				   $("#delsuccess").hide();
                 }
             }

            });

  	});



function fill_data(){

	$.ajax({
              type: "Post",
              url: "json/soil_list.php",
              data:{"action":"List"},
			  async: false,
              success: function(data) {
              		console.log(data);
                    var obj = $.parseJSON(data);
                  	
                    var result="";
					result += "<table id='tabledata' class='table table-striped table-bordered display' style='width:100%'>";
                    result += "<thead>";
                    result += "<tr><th style='width:5%'><input type='checkbox' id='checkAl'> All</th>";
					result += "<th>Name</th>";
					result += "<th>Ph</th>";
					result += "<th>Description</th>";
					result += "<th>Action</th>";
                    result += "</tr>";
                    result += "</thead>";
					result += "<tbody>";

					$.each(obj, function() {
					     result += "<tr><td><input type='checkbox'  class='checkboxtable'  name='check[]' value='"+this['soilId']+"' ></td>";
						 result += "<td>"+ this['soilName'] +"</td>";
						 result += "<td>"+ this['soilPh'] +"</td>";
						 result += "<td>"+ this['soilDescription'] +"</td>";
						 result += "<td><a onClick='updatedata("+this['soilId']+")' class='btn btn-xs btn-info waves-effect waves-light btnupd' data-toggle='modal' data-target='#myModal'><i class='ico fa fa-edit'></i></a> <a onClick='deldata("+this['soilId']+")' class='btn btn-xs btn-danger waves-effect waves-light btndel' data-remodal-target='remodal'><i class='ico fa fa-trash'></i></a></td>";

						 result += "</tr>";

                    });
					result += "</tbody>";
					result += "<tfoot>";
                    result += "<tr><th>&nbsp;</th>";
                	result += "<th>Name</th>";
					result += "<th>Ph</th>";
					result += "<th>Description</th>";
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
					  url:'json/soil_list.php',
					  data:{'pId':catid,"action":"getUpdate"},
					  async: false,
					  success: function(data) {
					  var obj = $.parseJSON(data);
					  console.log(obj)
						   $('#txtcid').val(obj[0].soilId);
						   $('#txttitle').val(obj[0].soilName);
						   $('#txtdose').val(obj[0].soilPh);
						   $('#txtdesc').val(obj[0].soilDescription);
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
            url:'json/soil_list.php',
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
            $("#lnksoil").addClass("current");
			
			fill_data();

				 $("#myForm").validate({

                    rules: {
                        txttitle: "required",
						txtdesc: "required",
						txtdose:"required"

                    },
                    messages: {
                       txttitle: "Name is required",
						txtdesc: "Description is required",
                        txtdose:"Ph is required"
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
							url: 'json/soil_list.php',
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
