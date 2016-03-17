<?php
	$controller_name = strtolower(substr(class_basename(Route::currentRouteAction()), 0, (strpos(class_basename(Route::currentRouteAction()), '@') -0)));
	$action_name = strtolower(substr(class_basename(Route::currentRouteAction()), (strpos(class_basename(Route::currentRouteAction()), '@') + 1)));
	$user_info = auth()->guard('admin')->user()->toArray();
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
		<meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
		<meta name="keywords" content="@yield('keywords')">
		<meta name="description" content="@yield('description')">
        <!-- END META SECTION -->
		<title>
			@yield('title')
		</title>
        <!-- CSS INCLUDE -->        
		{!! Html::style(('css/theme-default.css')) !!}
		{!! Html::style(('css/custom-style.css')) !!}
        <!-- EOF CSS INCLUDE -->         
		<!-- JQUERY -->
        <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
		@yield('meta')
		@yield('css')
		@yield('script')
		<script>
			function date_time(id)
			{
				date = new Date;
				year = date.getFullYear();
				month = date.getMonth();
				months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
				d = date.getDate();
				if(d<10)
				{
					d = "0"+d;
				}
				day = date.getDay();
				days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
				h = date.getHours();
				if(h<10)
				{
					h = "0"+h;
				}
				m = date.getMinutes();
				if(m<10)
				{
					m = "0"+m;
				}
				s = date.getSeconds();
				if(s<10)
				{
					s = "0"+s;
				}
				result = months[month]+' '+d+', '+year+' &nbsp;<span class="fa fa-clock-o"></span> '+h+':'+m+':'+s;
				document.getElementById(id).innerHTML = result;
				setTimeout('date_time("'+id+'");','1000');
				return true;
			}		
		</script>
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
						<a href="{!! URL::to('/'.$admin_prefix.'/dashboard') !!}">
							{!! Html::image('img/logo/logo.png', 'Logo', array('width'=>'120','style' => 'margin-top:-18px;')) !!}
                        </a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <div class="profile">
                            <div class="profile-image">
                                <!-- IMAGE USER -->
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $user_info['full_name']; ?></div>
                                <div class="profile-data-title">Web Developer/Designer</div>
                            </div>
                        </div>                                                                        
                    </li>
					<?php
						$active = "";
						if ($controller_name == "dashboardcontroller"){
							$active = "active";
						}
					?>
                     <li class="<?php echo $active; ?>">
						<a href="{!! URL::to('/'.$admin_prefix.'/dashboard') !!}" >
							<span class='fa fa-desktop'></span> <span class='xn-text'>Dashboard</span>
						</a>
                    </li>
					<?php
						$active = "";
						if (($controller_name == "userlevelcontroller") || ($controller_name == "usercontroller")){
							$active = "active";
						}
					?>
					<li class="xn-openable <?php echo $active; ?>">
						<a href="#">
							<span class="fa fa-users"></span>
							<span class="xn-text">Membership</span>
						</a>
						<ul>
							<?php
								$active = "";
								if ($controller_name == "userlevelcontroller"){
									$active = "active";
								}
							?>
							<li class="<?php echo $active; ?>">
								<a href="{!! URL::to('/'.$admin_prefix.'/user-level') !!}" >
									Master User Level
								</a>
							</li>
							<?php
								$active = "";
								if ($controller_name == "usercontroller"){
									$active = "active";
								}
							?>
							<li class="<?php echo $active; ?>">
								<a href="{!! URL::to('/'.$admin_prefix.'/user') !!}" >
									Master User
								</a>
							</li>
						</ul>
					</li>
					
				</ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                    </li>
					<li class="pull-right">
						<span id="date_time_div" style="padding : 15px 10px; color : #fff; display : block; vertical-align : text-bottom"></span>
						<script type="text/javascript">window.onload = date_time('date_time_div');</script>
					</li>
                    <!-- END MESSAGES -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
				
				<!-- CONTENT -->
				@yield('content')
				
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
							<a href="{!! URL::to('/'.$admin_prefix.'/logout') !!}" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
        
		<!-- START SCRIPTS -->
			<!-- START PLUGINS -->
			<script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery-ui.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
			<!-- END PLUGINS -->

			<!-- START THIS PAGE PLUGINS-->        
			<script type="text/javascript" src="{{ asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>
			<!-- END THIS PAGE PLUGINS-->        

			<!-- START TEMPLATE -->
			<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/actions.js') }}"></script>
			<!-- END TEMPLATE -->
		<!-- END SCRIPTS -->
    </body>
</html>