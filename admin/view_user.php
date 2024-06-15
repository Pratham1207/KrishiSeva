<?php
session_start();
include_once 'check_session.php';
include_once 'connection.php';
$page = "User ";
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
                    <div class="col-xs-12">
					  <div id="error" class="alert alert-danger" role="alert" style="display:none"> <strong>Oh snap!</strong> something went to wrong. please try again </div>
                              
					  <div id="success" class="alert alert-success" role="alert"  style="display:none"> <strong>Done !</strong>  cold store Updated Succesfully. </div>
					  <div id="delsuccess" class="alert alert-success" role="alert"  style="display:none"> <strong>Done !</strong>  User remove Succesfully. </div>
					  
			
                       
                        <div class="box-content card white">
                            <h4 class="box-title">User Details</h4>
                            <!-- /.box-title -->
						    
                            <div class="dropdown js__drop_down">
						<button type="type" id="btnmultidelete" class="btn btn-icon btn-icon-right btn-danger btn-xs waves-effect waves-light"><i class="ico fa fa-trash"></i> DELETE</button> &nbsp; &nbsp;
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
								
function fill_data(){

	$.ajax({
              type: "Post",
              url: "json/user_list.php",
              data:{"action":"List"},
			  async: false,
              success: function(data) {
                    var obj = $.parseJSON(data);      
                    var result="";
				  	   	
						result += "<table id='tabledata' class='table table-striped table-bordered display' style='width:100%'>";
				  	 	result += "<thead>";
                        result += "<tr><th style='width:5%'><input type='checkbox' id='checkAl'> All</th>";
                        result += "<th>Name</th>";
                        result += "<th>Contact</th>";
                        result += "<th>Email</th>";
						result += "<th>Reg.Date</th>";
						result += "<th>UType</th>";
					    result += "<th>Action</th>";
                        result += "</tr>";
                        result += "</thead>";
						result += "<tbody>";
						
					$.each(obj, function() {
					     result += "<tr><td><input type='checkbox'  class='checkboxtable' name='check[]' value='"+this['uId']+"' >";
				
						 result += "<td>"+ this['name'] +"</td>";
						 result += "<td>"+ this['uPhoneNumber'] +"</td>";
						 result += "<td>"+ this['uName'] +"</td>";
						 result += "<td>"+ this['date'] +"</td>";
						 if(this['uType']=="Farmer"){
						 		result += "<td>Farmer</td>";
						 } else {
						 		result += "<td>CS Owner</td>";
						 }
						 result += "<td><a onClick='deldata("+this['uId']+")' class='btn btn-xs btn-danger waves-effect waves-light btndel' data-remodal-target='remodal'><i class='ico fa fa-trash'></i></a></td>";
						 
						 result += "</tr>";
						 
                    });
					
						result += "</tbody>";
						result += "<tfoot>";
                        result += "<tr>";
						result += "<tr><th>&nbsp;</th>";
                        result += "<th>Name</th>";
                        result += "<th>Contact</th>";
                        result += "<th>Email</th>";
						result += "<th>Reg.Date</th>";
						result += "<th>UType</th>";
					    result += "<th>Action</th>";
                        result += "</tr>";
                        result += "</tfoot>";
                        result += "</table>";
									
                    $("#mytabledata").html(result);
					
              }
        });
	
			$("#tabledata").DataTable();

			$(".isaupd").click(function(){
			  var sid=$(this).data("id");
			  var status = $(this).data("status");
				$.ajax({
				type:'POST',
				url:'json/user_list.php',
				data:{'s_id':sid,"status":status,"action":"status"},
				success: function(data){
					 if(data=="YES"){
					   $("#error").hide();
					  $("#acsuccess").show();
					  $('#acsuccess').delay(1000).fadeOut('slow');
					  fill_data();
					 }else{
					  $("#error").show();
					  $("#acsuccess").hide();
					 }
				 }

				});

			});
		 
      }      
				
				
				
				
			function deldata(s)
			{
				$("#memid").val(s);
			} 
$(document).on('click','.confrm',function(){
 
     var del_id=$("#memid").val();
    
        $.ajax({
            type:'POST',
            url:'json/user_list.php',
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
		
  
  $(document).on('click','.allconfrm',function(){

     var del_id=$("#allmemid").val();

        $.ajax({
            type:'POST',
            url:'json/user_list.php',
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
		</script>
		
		<script type="text/javascript">
		
		$(document).ready(function() {
            $("#lnkuser").addClass("current"); 
			fill_data();
	    });
	
        </script>
			<script src="./assets/plugin/lightview/js/lightview/lightview.js"></script>
			<script src="./assets/plugin/modal/remodal/remodal.min.js"></script>

    </body>
</html>