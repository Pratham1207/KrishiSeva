<?php
session_start();
include_once 'check_session.php';
include_once 'connection.php';
$page = "Dashboard";
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

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body>
         <div class="main-menu">
            <?php include_once './sidemenu.php'; ?>
        </div>
        <!-- /.main-menu -->

        <?php include_once './header.php'; ?>

        <div id="wrapper">
            <div class="main-content">
			<div class="row small-spacing">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">

					<div class="statistics-box with-icon">
						<i class="ico fa fa-tree text-inverse"></i>
						<h2 class="counter text-inverse"> <?php $to=mysqli_query($con,"select * from tbl_plantdetails");
															   echo mysqli_num_rows($to);
															 ?></h2>
						<p class="text">Total Plants</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<div class="statistics-box with-icon">
						<i class="ico fa fa-industry text-success"></i>
						<h2 class="counter text-success"><?php $no=mysqli_query($con,"select * from tbl_coldstorage");
															   echo mysqli_num_rows($no);
															 ?></h2>
						<p class="text">Total ColdStore</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<div class="statistics-box with-icon">
						<i class="ico fa fa-envelope-o text-primary"></i>
						<h2 class="counter text-primary"><?php $co=mysqli_query($con,"select * from   tbl_contact_message");
															   echo mysqli_num_rows($co);
															 ?></h2>
						<p class="text">Contact Inquiry</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<div class="statistics-box with-icon">
						<i class="ico fa fa-book text-info"></i>
						<h2 class="counter text-info"><?php $od=mysqli_query($con,"select * from tbl_coldstorage_booking");
															   echo mysqli_num_rows($od);
															 ?></h2>
						<p class="text">Store Bookings</p>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
		</div>

                <div class="row small-spacing">
				
             <div class="col-lg-6 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">Monthly Bookings </h4>
                    <canvas id="bar-chartjs-chart" class="chartjs-chart" width="475" height="316"></canvas>
                </div>

            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">User Register data</h4>
                    <canvas id="donut-chartjs-chart" class="chartjs-chart" width="475" height="316"></canvas>
                </div>
            </div>
             <!--  <div class="col-lg-6 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">Monthly Bookings </h4>
                    <canvas id="radar-chartjs-chart" class="chartjs-chart" width="475" height="316"></canvas>
                </div>

            </div> -->
            <div class="col-lg-12 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">Cold  store register data</h4>
                    <canvas id="polar-chartjs-chart" class="chartjs-chart"  style="height:150px !important;"></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">Recent Store Bookings</h4>
                    <!-- /.box-title -->
                    <table class="table table-striped margin-bottom-10" style="height:150px;">
                         <thead>
                                          <tr>
                                                <th>User</th>
                                                <th>Cold Store</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Type</th>
                                                <th>Book Date</th>
                                            </tr>
                                        </thead>

                                     <tbody>
                                     <?php

                                    $sql = mysqli_query($con,"select *,(select name from tbl_user where uId=tbl_coldstorage_booking.uId) as user,(select title from tbl_coldstorage where cId=tbl_coldstorage_booking.cId) as coldstor from tbl_coldstorage_booking ORDER BY BookingId DESC");
                                    while($r = mysqli_fetch_assoc($sql)) {
                                     ?>
                                       <tr>

                                           <td><?php echo ucwords($r['user']); ?> </td>
                                           <td><?php echo  ucwords($r['coldstor']); ?> </td>
                                           <td><?php echo date('d M-Y',strtotime($r['startDate'])); ?></td>
                                           <td><?php echo date('d M-Y',strtotime($r['endDate'])); ?></td>
                                           <td> <?php echo $r['StoreType']; ?></td>
                                           <td><?php echo date('d M-Y',strtotime($r['createDate'])); ?></td>
                                    </tr>

                                     <?php } ?>
                                     </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.box-content -->
            </div>
             <div class="col-lg-6 col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">New Cold Store </h4>
                    <!-- /.box-title -->
                    <table class="table table-striped margin-bottom-10" style="height:150px;">
                         <thead>
                                          <tr>
                                                <th>OWner Name</th>
                                                <th>Cold Store Name</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                               
                                            </tr>
                                        </thead>

                                     <tbody>
                                     <?php

                                    $sql = mysqli_query($con,"select *,(select name from tbl_user where uId=tbl_coldstorage.uId) as Owners from tbl_coldstorage ORDER BY cId DESC LIMIT 5");
                                    while($r = mysqli_fetch_assoc($sql)) {
                                     ?>
                                       <tr>

                                           <td><?php echo  ucwords($r['Owners']); ?> </td>
                                           <td><?php echo  ucwords($r['title']); ?> </td>
                                           <td><?php echo $r['phoneno']; ?> </td>
                                           <td><?php echo $r['emailid']; ?> </td>
                                           <td><?php echo date('d M-Y',strtotime($r['rdate'])); ?></td>
                                           
                                    </tr>

                                     <?php } ?>
                                     </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.box-content -->
            </div>
		
        </div><!--/#wrapper -->
        <?php include_once './common_js.php'; ?>

		<script src="./assets/plugin/chart/chartjs/Chart.bundle.min.js"></script>
<script type="text/javascript">
 ! function(e) {
    "use strict";
    var t = {},
        r = function() {
            return Math.round(15 * Math.random()) + 5
        };
    e(document).ready(function() {
        return e("#bar-chartjs-chart").length && t.bar("bar-chartjs-chart", "top", "bar"), e("#donut-chartjs-chart").length && t.pie("donut-chartjs-chart", "doughnut"), e("#polar-chartjs-chart").length && t.line("polar-chartjs-chart"), e("#radar-chartjs-chart").length && t.polar("radar-chartjs-chart"), !1
    }), t = {
        bar: function(e, t, i) {
            var o = {
			     <?php  $res=mysqli_query($con,"select MONTHNAME(createDate) as Month,COUNT(*) as TotalPC, SUM(CASE WHEN status='Pending' THEN 1 ELSE 0 END) as P, SUM(CASE WHEN status='Approve' THEN 1 ELSE 0 END) as A from tbl_coldstorage_booking GROUP BY MONTH(createDate)");
				  ?>
                    labels: [<?php while($r=mysqli_fetch_array($res)) { ?>"<?php echo $r["Month"]; ?>", <?php } ?>],
                    datasets: [{
                        label: "Pending",
                        backgroundColor: "rgba(249,200,81,0.3)",
                        borderColor: "rgb(249, 200, 81)",
                        borderWidth: 1,
                        hoverBackgroundColor: "rgba(249,200,81,0.6)",
                        hoverBorderColor: "rgb(249, 200, 81)",
                        data: [<?php $res=mysqli_query($con,"select MONTHNAME(createDate) as Month,COUNT(*) as TotalPC, SUM(CASE WHEN status='Pending' THEN 1 ELSE 0 END) as P, SUM(CASE WHEN status='Approve' THEN 1 ELSE 0 END) as A from tbl_coldstorage_booking GROUP BY MONTH(createDate)"); while($ra=mysqli_fetch_array($res)) { echo $ra["P"].","; } ?>]
                    },  {
                        label: "Approve",
                        backgroundColor: "rgba(90,247,71,0.6)",
                        borderColor: "#33e730",
                        borderWidth: 1,
                        hoverBackgroundColor: "rgba(90,247,71,0.6)",
                        hoverBorderColor: "#33e730",
                        data: [<?php $res=mysqli_query($con,"select MONTHNAME(createDate) as Month,COUNT(*) as TotalPC, SUM(CASE WHEN status='Pending' THEN 1 ELSE 0 END) as P, SUM(CASE WHEN status='Approve' THEN 1 ELSE 0 END) as A from tbl_coldstorage_booking GROUP BY MONTH(createDate)"); while($rs=mysqli_fetch_array($res)) { echo $rs["A"].","; } ?>]
                    },
                    {
                        label: "Rejected",
                        backgroundColor: "rgba(245,112,122,0.3)",
                        borderColor: "#f5707a",
                        borderWidth: 1,
                        hoverBackgroundColor: "rgba(245,112,122,0.6)",
                        hoverBorderColor: "#f5707a",
                        data: [<?php $res=mysqli_query($con,"select MONTHNAME(createDate) as Month,COUNT(*) as TotalPC, SUM(CASE WHEN status='Pending' THEN 1 ELSE 0 END) as P, SUM(CASE WHEN status='Approve' THEN 1 ELSE 0 END) as A,SUM(CASE WHEN status='Rejected' THEN 1 ELSE 0 END) as R from tbl_coldstorage_booking GROUP BY MONTH(createDate)"); while($rs=mysqli_fetch_array($res)) { echo $rs["R"].","; } ?>]
                    }]
                },
                a = document.getElementById(e).getContext("2d");
            return new Chart(a, {
                type: i,
                data: o,
                options: {
                    hover: {
                        mode: "label"
                    },
                    responsive: !0,
                    legend: {
                        position: t
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: !0
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: !0
                            }
                        }]
                    }
                }
            }), !1
        },
        line: function(e, t) {
            var i = {
                    labels: [<?php $res=mysqli_query($con,"select MONTHNAME(rdate) as Month,COUNT(*) as TotalPC from tbl_coldstorage GROUP BY MONTH(rdate)"); while($rs=mysqli_fetch_array($res)) { ?> "<?php echo $rs["Month"]; ?>", <?php } ?> ],
                    datasets: [{
                        label: "Store",
                        fill: t,
                        borderColor: "rgba(245,112,122,1)",
                        pointBackgroundColor: "rgb(245,112,122)",
                        backgroundColor: "rgba(245,112,122,0.3)",
                        data: [<?php $res=mysqli_query($con,"select MONTHNAME(rdate) as Month,COUNT(*) as TotalPC from tbl_coldstorage GROUP BY MONTH(rdate)"); while($rs=mysqli_fetch_array($res)) { echo $rs["TotalPC"].","; } ?>]
                    }]
                },
                o = document.getElementById(e).getContext("2d");
            return new Chart(o, {
                type: "line",
                data: i,
                options: {
                    hover: {
                        mode: "label"
                    },
                    responsive: !0,
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: !0
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: !0
                            }
                        }]
                    }
                }
            }), !1
        },
        pie: function(e, t) {
            var i = document.getElementById(e).getContext("2d"),
                o = {
                    type: t,
                    data: {
                        datasets: [{
                            <?php $res=mysqli_query($con,"SELECT count(*)as F,(select count(*) from tbl_user where uType!='Farmer')as O  from tbl_user where uType='Farmer'"); ?>
                            data: [<?php while($rs=mysqli_fetch_array($res)) { echo $rs["F"].",".$rs["O"]; } ?>],
                            backgroundColor: ["#f9c851", "#3ac9d6"],
                            hoverBackgroundColor: ["#f9c851", "#3ac9d6"],
                            hoverBorderColor: "#fff"
                        }],
                        labels: ["Farmers", "Owners"]
                    },
                    options: {
                        responsive: !0
                    }
                };
            return new Chart(i, o), !1
        },
        polar: function(e) {
            var t = document.getElementById(e).getContext("2d"),
                i = {
                    data: {
                        datasets: [{
                            data: [r(), r(), r(), r()],
                            backgroundColor: ["#f5707a", "#188ae2", "#4bd396", "#8d6e63"],
                            label: "My dataset"
                        }],
                        labels: ["Red", "Blue", "Green", "Grey"]
                    },
                    options: {
                        responsive: !0,
                        legend: {
                            position: "top"
                        },
                        scale: {
                            ticks: {
                                beginAtZero: !0
                            },
                            reverse: !1
                        },
                        animation: {
                            animateRotate: !1,
                            animateScale: !0
                        }
                    }
                };
            return new Chart(t, i), !1
        }
    }
}(jQuery);
		</script>

	    <script src="./assets/scripts/main.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#lnkDashboard").addClass("current");
            });
        </script>
    </body>
</html>