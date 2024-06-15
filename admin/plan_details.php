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
    <body>
        <div class="main-menu">
            <?php include_once './sidemenu.php'; ?>
        </div>
        <!-- /.main-menu -->

        <?php include_once './header.php'; ?>

        <div id="wrapper">
            <div class="main-content">
			<?php 
			
			$sql = mysqli_query($con,"select * from tbl_plantdetails  as pd
			 left join tbl_plantinfo as p on p.plantId=pd.plantId
			 left join tbl_fertilizerinfo as f on f.fertilizerId=pd.fertilizerId 
			 left join tbl_soilinfo as s on s.soilId=pd.soilId
			 left join tbl_pesticideinfo as pes on pes.pestId=pd.pestId
			 left join tbl_warminfo as w on w.warmId=pd.warmId
			 where pd.plantDetailId='".$_REQUEST['id']."'");
  							while($p = mysqli_fetch_array($sql)) {
							   $name= $p["plantName"];
							   $image=$p["plantImage"];
							   $descp=$p["plantDescription"];
							   $plantSubType=$p["plantSubType"];
							   $plantBestSeason=$p["plantBestSeason"];
							   $plantDistance=$p["plantDistance"];
							   $fertilizerName=$p["fertilizerName"];
							   $fertilizerQuantity=$p["fertilizerQuantity"];
							   $fertilizerTime=$p["fertilizerTime"];
							   $tempreture=$p["tempreture"];
							   $water=$p["water"];
							   $growthTime=$p["growthTime"];
							   $soilName=$p["soilName"];
							   $soilPh=$p["soilPh"];
							   $soilDescription=$p["soilDescription"];
							   $pestName=$p["pestName"];
							   $pestDose=$p["pestDose"];
							   $pestDescription=$p["pestDescription"];
							   $warmName=$p["warmName"];
							   }
			?>
          <div class="row small-spacing">
			<div class="col-md-12 col-xs-12">
				<div class="box-content bordered primary margin-bottom-20">
   					<img src="images/plan/<?php echo $image; ?>" />
				 <br/>	
				 <h4><?php echo $name; ?></h4>
				 <hr/>
				 <p><?php echo $descp; ?></p>
					<hr/>

                                    <table width="100%"  class='table table-striped table-bordered display'>
                                       <tr>
                                        <th>Seasion</th>
                                        <td><p class="mb-1"><?php echo ucwords($plantBestSeason); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>Plant Distance</th>
                                        <td><p class="mb-1"><p class="mb-1"><?php echo ucwords($plantDistance); ?></p>
                                    </p></td>
                                    </tr> 
                                     <tr>
                                        <th>Fertilizer</th>
                                        <td><p class="mb-1"><?php echo ucwords($fertilizerName); ?></p>
                                    </td>
                                    </tr> 
                                    <tr>
                                        <th>Fertilizer Quantity</th>
                                        <td><p class="mb-1"><?php echo ucwords($fertilizerQuantity); ?></p>
                                    </td>
                                    </tr> 
                                     <tr>
                                        <th>Fertilizer Time</th>
                                        <td><p class="mb-1"><?php echo ucwords($fertilizerTime); ?></p>
                                    </td>
                                    </tr> 
                                     <tr>
                                        <th>Tempreture</th>
                                        <td><p class="mb-1"><?php echo ucwords($tempreture); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>Soil</th>
                                        <td><p class="mb-1"><?php echo ucwords($soilName); ?></p>
                                    </td>
                                    </tr>
                                      <tr>
                                        <th>Soil Description</th>
                                        <td><p class="mb-1"><?php echo ucwords($soilDescription); ?></p>
                                    </td>
                                    </tr> 
                                    
                                     <tr>
                                        <th>Pesticide</th>
                                        <td><p class="mb-1"><?php echo ucwords($pestName); ?></p></td>
                                    </tr> 
                                    <tr>
                                        <th>Pesticide Dose</th>
                                        <td><p class="mb-1"><?php echo ucwords($pestDose); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>Pesticide Description</th>
                                        <td><p class="mb-1"><?php echo ucwords($pestDescription); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>GrowthTime</th>
                                        <td><p class="mb-1"><?php echo ucwords($growthTime); ?></p></td>
                                    </tr> 
                                     <tr>
                                        <th>warm</th>
                                        <td><p class="mb-1"><?php echo ucwords($warmName); ?></p></td>
                                    </tr> 

                                    </table>
                                    
                                  
				</div>              
            </div>
            <!-- /.main-content -->
        </div><!--/#wrapper -->
       
    
    </body>
	  <script src="assets/scripts/main.min.js"></script>
        <script type="text/javascript">
		
		$(document).ready(function() {
            $("#lnkproduct").addClass("current"); 
			$("#category").addClass("current active"); 
				    });
	</script>
		<script src="./assets/plugin/lightview/js/lightview/lightview.js"></script>
		<script src="./assets/plugin/modal/remodal/remodal.min.js"></script>
		
	<script src="./assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="./assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="./assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="./assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="./assets/scripts/datatables.demo.min.js"></script>

</html>