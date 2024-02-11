<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/lnr-icon.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<title>Admin Dashboard</title>
	</head>
	<body>
	<div class="inner-wrapper">
		<div id="loader-wrapper">
			<div class="loader">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>
		<header class="header">
			<div class="top-header-section">
				<div class="container-fluid">
					<div class="row align-items-center">
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
								<div class="col-12">
									<div class="card ctm-border-radius shadow-sm grow">
										<div class="card-body py-4">
											<div class="row">
												<div class="col-md-12 mr-auto text-left">
													<div class="custom-search input-group">
														<div class="custom-breadcrumb">
															<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
																<li class="breadcrumb-item d-inline-block"><a href="/" class="text-dark">Home</a></li>
																<li class="breadcrumb-item d-inline-block active">Dashboard</li>
															</ol>
															<h4 class="text-dark">Admin Dashboard</h4>
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
										<img src="assets/img/profiles/img-13.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="100">
									</div>
									<div class="user-details">
										<h4>
											<b>Welcome Admin</b>
										</h4>
										{{date('D,d M Y')}}
									</div>
								</div>
							</div>
							<div class="sidebar-wrapper d-lg-block d-md-none d-none">
								<div class="card ctm-border-radius shadow-sm border-none grow">
									<div class="card-body">
										<div class="row no-gutters">
											<div class="col-6 align-items-center shadow-none text-center">
												<a href="/view-staff-management-index" class="{{Request::path()==='view-staff-management-index'?'text-white active':'text-dark'}}  p-4 second-slider-btn ctm-border-right ctm-border-top">
													<span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span>
													<span class="">Staff Management</span>
												</a>
											</div>
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
						</aside>
					</div>
					<div class="col-xl-9 col-lg-8  col-md-12">
					<br>
					@yield('dashboard-admin-content')
						<div class="sidebar-overlay" id="sidebar_overlay"></div>
						<script src="assets/js/jquery-3.2.1.min.js"></script>
						<script src="assets/js/popper.min.js"></script>
						<script src="assets/js/bootstrap.min.js"></script>
						<script src="assets/js/Chart.min.js"></script>
						<script src="assets/js/chart.js"></script>
						<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
						<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
						<script src="assets/js/script.js"></script>
	</body>
</html>