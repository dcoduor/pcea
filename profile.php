<?php
	session_start();

	$login_session=$_SESSION['user_login'];
	if (!$_SESSION['user_login']) { 
		header('location: index.php');
	}

	include('dbcontroller.php');
		
	$sql = "SELECT * from church_log_org where userName='$login_session' ";

	$query = mysqli_query($conn, $sql);

		if (!$query) {
			die("SQL Error " .mysqli_error($conn));
		}

		while ($row = mysqli_fetch_array($query))
			{
    			$id = $row['x_id'];
			}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover{background-color:#f5f5f5}
		img{
			width: 250px;
			height: 300px;
			border: 1px solid #ddd;
			margin: 0;
			padding: 0;
		}
		#profilespace{
			background: url(assets/images/placeholder/profile.png);
		    background-size: 250px ;
		    background-repeat: no-repeat;
		    float: center;

		}
		
		
		</style>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Control Panel
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
									

						

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
									<?php 
											echo $login_session;
									?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="editprofile.php">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
	                <li class="">
	                <a href="mydashboard.php">
	                    <i class="menu-icon fa fa-tachometer"></i>
	                    <span class="menu-text"> Dashboard </span>
	                </a>

	                <b class="arrow"></b>
	            </li>

				<li class="active">
	                <a href="profile.php">
	                    <i class="menu-icon fa fa-list-alt"></i>
	                    <span class="menu-text"> My profile </span>
	                </a>

	                <b class="arrow"></b>
	            </li>


				<li class="">
	                <a href="#" class="dropdown-toggle">
	                    <i class="menu-icon fa fa-list-alt"></i>
	                    <span class="menu-text"> Edit Profile </span>

	                    <b class="arrow fa fa-angle-down"></b>
	                </a>

	                <b class="arrow"></b>

	                <ul class="submenu">
						
	                    <li class="">
	                        <a href="editpersonal.php">
	                            <i class="menu-icon fa fa-caret-right"></i>
	                            Personal info
	                        </a>

	                        <b class="arrow"></b>
	                    </li>

	                    <li class="">
	                        <a href="editcontact.php">
	                            <i class="menu-icon fa fa-caret-right"></i>
	                            Contact info
	                        </a>

	                        <b class="arrow"></b>
	                    </li>
	                    <li class="">
	                        <a href="dependants.php">
	                            <i class="menu-icon fa fa-caret-right"></i>
	                            Dependants
	                        </a>

	                        <b class="arrow"></b>
	                    </li>

						<li class="">
	                        <a href="editprofile.php">
	                            <i class="menu-icon fa fa-caret-right"></i>
	                            Church info
	                        </a>

	                        <b class="arrow"></b>
	                    </li>

	                    
	                </ul>
	            </li>
	        

	            <li class="">
	                <a href="comment.php">
	                    <i class="menu-icon fa fa-list-alt"></i>
	                    <span class="menu-text"> Message Admin </span>
	                </a>

	                <b class="arrow"></b>
	            </li>

	            <li class="">
	                <a href="announcements.php">
	                    <i class="menu-icon fa fa-list-alt"></i>
	                    <span class="menu-text"> Events </span>
	                </a>

	                <b class="arrow"></b>
	            </li>

	            <li class="">
	                <a href="#" class="dropdown-toggle">
	                    <i class="menu-icon fa fa-tag"></i>
	                    <span class="menu-text"> Group forums </span>

	                    <b class="arrow fa fa-angle-down"></b>
	                </a>

	                <b class="arrow"></b>

	                <ul class="submenu">
	                    <li class="">
	                        <a href="forum.php">
	                            <i class="menu-icon fa fa-caret-right"></i>
	                            Church/social groups
	                        </a>

	                        <b class="arrow"></b>
	                    </li>

	                    <li class="">
	                        <a href="professional_forum.php">
	                            <i class="menu-icon fa fa-caret-right"></i>
	                            Congregational forum
	                        </a>

	                        <b class="arrow"></b>
	                    </li>

	                    
	                </ul>
	            </li>
				<li class="">
	                <a href="myadmin.php">
	                    <i class="menu-icon fa fa-list-alt"></i>
	                    <span class="menu-text"> Admin </span>
	                </a>

	                <b class="arrow"></b>
	            </li>
	        </ul><!-- /.nav-list -->
					<!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">My Profile</a>
							</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php
									if(isset($error) && $error){
										echo "<p style=\"color: red;\">*",htmlspecialchars($error),"</p>\n\n";
									}elseif(isset($success) && $success){
										echo "<p style=\"color: green;\">*",htmlspecialchars($success),"</p>\n\n";
									}
									elseif(isset($exit_success) && $exit_success){
										echo "<p style=\"color: green;\">*",htmlspecialchars($exit_success),"</p>\n\n";
									}
									elseif(isset($exit_error) && $exit_error){
										echo "<p style=\"color: red;\">*",htmlspecialchars($exit_error),"</p>\n\n";
									}
								?>
								
									<div class="col-sm-12">
										
										<table>
											<tr>
												<td><h5 style="color:#fff;padding:10px;"><a href="profilepic.php">Upload a profile picture</a></h5></td>
												<td>
													<form action="remove_profilepic.php" method="post">
														<input type="hidden" name="user" value="<?=$id;?>">
														<input id="submit-button" type="Submit" value="Remove Profile Picture">
													</form>
												</td>
											</tr>
										</table>
									</div>
									</div>
									
									<div class="col-sm-3" style="height: 320px;" id="profilespace">
										

										<?php
											$sql = "SELECT * from profile_org where user='$id' ";
											$query = mysqli_query($conn, $sql);
											while ($row = mysqli_fetch_array($query)) {
												echo "<div id='img_div'>";
													echo "<img src='uploads/".$row['image']."' >";
												echo "</div >";
											}
										?>
										
										
									</div>
									<div class="col-sm-9">
										<div class="col-sm-12" style="background-color:#0059b3;">
										<h3 style="color:#fff;padding:10px;">Personal Information</h3>
									</div>
										<table>
										<tbody>
											<?php 
												$sql = "SELECT * from members_org where id='$id' ";
												$query = mysqli_query($conn, $sql);
												while ($row = mysqli_fetch_array($query))
												{
    												echo'<tr>
            												<td>Full Name</td>
            												<td>'.$row['names'].'</td>
        												</tr>
        												<tr>
            												<td>Status</td>
            												<td>'.$row['status'].'</td>
        												</tr>
        												<tr>
            												<td>Marital Status</td>
            												<td>'.$row['marital_status'].'</td>
        												</tr>
        												<tr>
            												<td>Date Of Birth</td>
            												<td>'.$row['dob'].'</td>
        												</tr>
        												<tr>
            												<td>Occupation</td>
            												<td>'.$row['occupation'].'</td>
        												</tr><tr>
            												<td>Employer</td>
            												<td>'.$row['employer'].'</td>
        												</tr>
														<tr>
            												<td>ID Number</td>
            												<td>'.$row['id_number'].'</td>
        												</tr>
														<tr>
            												<td>Marital Date</td>
            												<td>'.$row['marital_date'].'</td>
        												</tr>
														<tr>
            												<td>Marital Place</td>
            												<td>'.$row['marital_place'].'</td>
        												</tr>'
        												;
												}
											?>
										</tbody>
									</table>
									</div>
																																													
									<div class="col-sm-12" style="background-color:#0059b3;">
										<h3 style="color:#fff;padding:10px;">Contact Information</h3>
									</div>
									<table>
										<tbody>
											<?php 
												$sql = "SELECT * from contacts_org where id='$id' ";
												$query = mysqli_query($conn, $sql);
												while ($row = mysqli_fetch_array($query))
												{
    												echo'<tr>
            												<td>Phone Number</td>
            												<td>'.$row['phone_number'].'</td>
        												</tr>
        												<tr>
            												<td>Email Address</td>
            												<td>'.$row['email'].'</td>
        												</tr>
        												<tr>
            												<td>Residence</td>
            												<td>'.$row['residence'].'</td>
        												</tr>
        												<tr>
            												<td>Street</td>
            												<td>'.$row['street'].'</td>
        												</tr>
        												<tr>
            												<td>Plot Number</td>
            												<td>'.$row['plot_number'].'</td>
        												</tr><tr>
            												<td>Postal Address</td>
            												<td>'.$row['postal_address'].'</td>
        												</tr>
														'
        												;
												}
											?>
										</tbody>
									</table>
									<div class="col-sm-12" style="background-color:#0059b3;">
										<h3 style="color:#fff;padding:10px;">Church Related Information</h3>
									</div>
									<table>
										<tbody>
											<?php 
												$sql = "SELECT * from church_org where id='$id' ";
												$query = mysqli_query($conn, $sql);
												while ($row = mysqli_fetch_array($query))
												{
    												echo'<tr>
            												<td>District</td>
            												<td>'.$row['district'].'</td>
        												</tr>
        												<tr>
            												<td>District Elder</td>
            												<td>'.$row['district_elder'].'</td>
        												</tr>
        												<tr>
            												<td>Baptism Date</td>
            												<td>'.$row['baptism_date'].'</td>
        												</tr>
        												<tr>
            												<td>Baptism Place</td>
            												<td>'.$row['baptism_place'].'</td>
        												</tr>
        												<tr>
            												<td>Confirmation Date</td>
            												<td>'.$row['confirmation_date'].'</td>
        												</tr><tr>
            												<td>Confirmation Place</td>
            												<td>'.$row['confirmation_place'].'</td>
        												</tr>
														<tr>
            												<td>Holy Communion Last Attendance</td>
            												<td>'.$row['holycommunion_last_attendance'].'</td>
        												</tr>
        												<tr>
            												<td>Church Group</td>
            												<td>'.$row['church_group'].'</td>
        												</tr><tr>
            												<td>Freewill Contribution</td>
            												<td>'.$row['freewill_contribution'].'</td>
        												</tr>'
        												;
												}
											?>
										</tbody>
									</table>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">P.C.E.A Makadara</span>
							Parish &copy; 2017
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
