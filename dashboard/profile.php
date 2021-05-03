<?php 
require '../functions.php';
session_start();

if (!isset($_SESSION["login"])) {
    header("Location:../login/login.php");
    exit;
}

//ambil data dari tabel penyewa/query data penyewa, sintaks SQL nya ditulis dalam huruf besar
// $id_dev = $_GET["id"];
// $developer = query("SELECT * FROM pengembang WHERE id = $id_dev");

// $id_admin = $_SESSION["id"];
// $admin = query("SELECT * FROM admin WHERE email = '$id_admin'");

// foreach ($developer as $row) :
// 	$id_perusahaan = $row["nama_perusahaan"];
// endforeach;
$iprestasi = query("SELECT * FROM iprestasi"); 

$id_user = $_SESSION["id_user"];
$user = query("SELECT * FROM akun WHERE email = '$id_user'");											

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Biodata - PABW</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
<!-- 	<link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><img src="assets/img/CO-HOUSE.png" alt="Klorofil Logo" class="img-responsive logo" style="height: 21px"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../MaulanaFadilah2.jpg" class="img-circle" alt="Avatar">
								<?php foreach ($user as $u) : ?>
								<span><?= $u["email"]; ?></span> 
								<?php endforeach; ?>
							<i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="../login/logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="profile.php" class="active"><i class="lnr lnr-user"></i> <span>Biodata</span></a></li>
						<li><a href="ipk.php" class=""><i class="lnr lnr-star"></i> <span>Nilai</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="../MaulanaFadilah2.jpg" class="img-circle" alt="Avatar" width="100" height="100">
										
										<h3 class="name">Maulana Fadilah</h3>
										<span class="online-status status-available">Available</span>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail" >
									<div class="profile-info" >
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											
											<li>NIM <span>6701191022</span></li>
											<li>Kelas <span>D3SI-43-01</span></li>
											<li>Telepon <span>082249389862</span></li>
											<?php foreach ($user as $u) : ?>
											<li>Email <span><?= $u["email"]; ?></span></li>
											<?php endforeach; ?>
											
										</ul>
									</div>
									<div class="text-center">

										<a href="ipk.php" class="btn btn-info">Lihat IPK</a>
										
									</div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->

							<!-- RIGHT COLUMN -->
							<div class="profile-right" style="height: 540px">
								
								<!-- PANEL NO CONTROLS -->
								<div class="panel" style="height: 495px">
									<div class="panel-heading" >
										<h3 class="panel-title">Indeks Prestasi</h3>
									</div>
									

								<div class="panel-body">
									<!-- TABLE HOVER -->
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Semester</th>
												<th>Nilai</th>
											</tr>
										</thead>
										<tbody>
									        <!-- Awal Perulangan untuk mengambil seluruh data dari database -->
									        <?php 

									         ?>

									        <?php $i = 1; ?>
									        <?php foreach ($iprestasi as $row ) : ?>
									        <tr>
									            <td><?= $i; ?></td>
									            <td><?= $row["semester"]; ?></td>
									            <td><?= $row["ip"]; ?></td>
									        </tr>
									        <?php $i++; ?>
									        <?php endforeach; ?>
									    	
									        <!-- Akhir Perulangan untuk mengambil seluruh data dari database -->
										</tbody>
									</table>
									<!-- END TABLE HOVER -->
								</div>
								<!-- END PANEL NO CONTROLS -->

							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			  <div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
