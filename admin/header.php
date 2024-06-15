<script>

/*function getcount()
{
		$.ajax({
				url: 'json/noti/getpendingnoti.php',
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				success: function(data, status){
				$('#no').html(data.length);
					$.each(data, function(i,item){

						//$('#no').html(item.np);

						if(item.np>0)
						{
							//$('#chatAudio')[0].play();
						  $('#notification').show();
						  $('#morenoti').show();
						}
						else
						 {

						  $('#notification').append('<li><a><span class="avatar bg-warning"><i class="fa fa-warning"></i></span><span class="name" style="font-size:20px;">No Notification Avilable</span></a></li> ');
						  $('#morenoti').hide();
						  }

					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });

	}
	getcount();


		function get_notification()
		{
				$('#notification').html('');
				$.ajax({
				url: 'json/noti/getnoti.php',
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				async : false,
				success: function(data, status){

					$.each(data, function(i,item){

    					var menudate = new Date(item.order_date);
  						var menudate1 = menudate.toString("d MMM yyyy hh:mm:ss A");
						var day = menudate1.substr(0, 3);
						var res = menudate1.substr(3, 12);
						var tm = menudate1.substr(17, 8);

						if(item.order_type=="home_delivery")
						$('#notification').append('<li><a href="#"><span class="avatar"><img src="assets/images/icon-email.png" alt="" /></span><span class="name">'+ item.uname +'</span><span class="desc text-success">Received New Order from Home Delivery</span><span class="time">'+ res +' <br/> '+ day + ", " + tm+'</span></a></li>');
						else
							$('#notification').append('<li><a href="#"><span class="avatar"><img src="assets/images/icon-cart.png" alt="" /></span><span class="name">'+ item.uname +'</span><span class="desc text-info">Received New Order  </span><span class="time">'+ res +' <br/> '+ day + ", " + tm+'</span></a></li>');

					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });

		}
	get_notification();

	setInterval(get_notification,10000);
	setInterval(getcount,10000);


	*/

</script>
<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title"><?php echo $page; ?></h1>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
    <div class="pull-right">
        <!-- /.ico-item -->
		<a href="#" class="ico-item pulse"><span class="ico-item fa fa-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
        <!-- /.ico-item -->
        <div class="ico-item">
            <img src="./assets/images/avatar.jpg" alt="" class="ico-img" />
            <ul class="sub-ico-item">
			    <li id="lnkchangepass"><a class="" href="change_password.php">Change Password</a></li>
                <li><a class="" href="logout.php">Log Out</a></li>
            </ul>
            <!-- /.sub-ico-item -->
        </div>

        <!-- /.ico-item -->
 	   </div>
    <!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->
<div id="notification-popup" class="notice-popup js__toggle" data-space="50">
	<h2 class="popup-title">Your Notifications</h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list" id="notification">


		</ul>
		<!-- /.notice-list -->
		<a id="morenoti" href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
