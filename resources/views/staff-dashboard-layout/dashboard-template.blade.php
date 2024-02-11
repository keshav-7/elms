<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/lnr-icon.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<title>Staff Page</title>
	</head>
	<body>
		<div id="loader-wrapper">
			<div class="loader">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>
		<div class="inner-wrapper">
			<header class="header">
				<div class="top-header-section">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-lg-3 col-md-3 col-sm-3 col-6">
								<!-- <div class="logo my-3 my-sm-0">
									<a href="employees-dashboard.html">
										<img src="assets/img/logo.png" style="border-radius: 15%;" alt="logo image" class="img-fluid" width="100">
									</a>
								</div> -->
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
								<div class="user-block d-none d-lg-block">
									<div class="row align-items-center">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="user-info align-right dropdown d-inline-block header-dropdown">
												<a data-toggle="dropdown" class=" menu-style dropdown-toggle">
													<span class="media align-items-center">
													<span  href="/handle-logout" class="lnr lnr-power-switch mr-3"></span>
												</a>
											</div>											
											<!-- <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
												<a class="dropdown-item p-2" href="/handle-logout">
													<span class="media align-items-center">
														<span class="lnr lnr-power-switch mr-3"></span>
														<span class="media-body text-truncate">
															<span class="text-truncate">Logout</span>
														</span>
													</span>
												</a>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="row">
									<div class="col-md-12">
										<div class="card ctm-border-radius shadow-sm grow">
											<div class="card-body py-4">
												<div class="row">
													<div class="col-md-12 mr-auto text-left">
														<div class="custom-search input-group">
															<div class="custom-breadcrumb">
																<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
																	<li class="breadcrumb-item d-inline-block">Home</li>
																	<li class="breadcrumb-item d-inline-block active">Dashboard</li>
																</ol>
																<h4 class="text-dark">Employees Dashboard</h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
									<div class="user-info card-body">
										<div class="user-avatar mb-4">
											<img src="{{asset('dashboard-template')}}/img/undraw_profile.svg" alt="User Avatar" class="img-fluid rounded-circle" width="100">
										</div>
										<div class="user-details">
											<h4>
												<b>Welcome {{$staff_basic_data[0]->firstname ?? ''}} {{$staff_basic_data[0]->lastname ?? ''}}</b>
											</h4>
											<p>{{date('D,d M Y')}}</p>
										</div>
									</div>
								</div>
								<div class="sidebar-wrapper d-lg-block d-md-none d-none">
								<div class="card ctm-border-radius shadow-sm border-none grow">
									<div class="card-body">
										<div class="row no-gutters">
											<div class="col-6 align-items-center shadow-none text-center">
												<a href="/handle-logout" class="{{Request::path()==='handle-logout'?'text-white active':'text-dark'}}  p-4 last-slider-btn ctm-border-right">
													<span class="lnr lnr-power-switch pr-0 pb-lg-2 font-23"></span>
													<span class="">Logout</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>								
								<div class="sidebar-wrapper d-lg-block d-md-none d-none">
									<div class="card ctm-border-radius shadow-sm border-none grow"></div>
								</div>
							</aside>
						</div>
						<div class="col-xl-9 col-lg-8 col-md-12">
							@yield('dashboard-staff-content')
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		<script src="assets/js/script.js"></script>
	</body>
</html>


