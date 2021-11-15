<!doctype html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="/assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="/assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/ukdw.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/img/ukdw.png">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top bg-light">
			<div class="brand">
				<a href="/"><img src="/assets/img/ukdw2.png" width="150px" height="60px" alt="Els Komputer Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{auth()->user()->nama}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav></br>

		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						@if(auth()->user()->role == 'dosen')
						<li><a href="/" class="@yield('home')"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						@elseif(auth()->user()->role == 'kaprodi')
						<li><a href="/" class="@yield('home')"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li><a href="/kaprodi/list_dosen" class="@yield('dosen')"><i class="lnr lnr-code"></i> <span>Dosen</span></a></li>
						<li><a href="/kaprodi/profil" class="@yield('profil')"><i class="lnr lnr-code"></i> <span>Profil</span></a></li>
						@elseif(auth()->user()->role == 'admin')
						<li><a href="/" class="@yield('home')"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li><a href="/admin/list_dosen" class="@yield('dosen')"><i class="lnr lnr-code"></i> <span>Dosen</span></a></li>
						@elseif(auth()->user()->role == 'inqa')
						<li><a href="/" class="@yield('home')"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<!-- <li><a href="/inqa/list_dosen" class="@yield('dosen')"><i class="lnr lnr-code"></i> <span>Dosen</span></a></li>
						<li><a href="/admin/listdosen" class="@yield('dosen')"><i class="lnr lnr-chart-bars"></i> <span>Dosen</span></a></li> -->
						<!-- <li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
						<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Profile</a></li>
									<li><a href="page-login.html" class="">Login</a></li>
									<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
								</ul>
							</div>
						</li>
						<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li> -->
						@endif
					</ul>
				</nav>
			</div>
		</div>

		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
          			@yield('content')
		  		</div>
			</div>
        </div>
	</div>
</body>
	
	
	<!-- Javascript -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="/assets/vendor/chartist/js/chartist.min.js"></script>
<script src="/assets/scripts/klorofil-common.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

@yield('footer')
<script>
	$(document).ready( function () {
	$('#urutKelas').DataTable();
} );
</script>
<script>
$(document).ready(function() {
    $('#dtBasicExample').DataTable( {
        "dom": '<"toolbar">frt'
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#dtBasicExamples').DataTable( {
        "dom": '<"toolbar">frt'
    } );
} );
</script>

</html>
