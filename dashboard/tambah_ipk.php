<?php 
require '../functions.php';
session_start();

if (!isset($_SESSION["login"])) {
    header("Location:../login/login.php");
    exit;
}

$id_user = $_SESSION["id_user"];
$iprestasi = query("SELECT * FROM iprestasi");
$user = query("SELECT * FROM akun WHERE email = '$id_user'");	

if (isset($_POST["submit"]) ){

    if (tambah_ipk($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href='ipk.php'

        </script>
        ";
    }else {
            echo "
        <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href='tambah_ipk.php'

        </script>
        ";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Indeks Prestasi - PABW</title>
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
						<li><a href="profile.php" class=""><i class="lnr lnr-user"></i> <span>Biodata</span></a></li>
						<li><a href="ipk.php" class="active"><i class="lnr lnr-star"></i> <span>Nilai</span></a></li>
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
					<h3 class="page-title">Tambah IPK</h3>

					<div class="row">
						<div class="col-md-12">
							<!-- INPUTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Tambah Nilai</h3>
								</div>
								<div class="panel-body">
									<form method="post" action="">
								    	<div class="form-group">
								    		<label>Semester</label>
								    		<input type="text" name="semester" class="form-control" placeholder="Masukan Semester" required>
								    	</div>
								    	<div class="form-group">
								    		<label>Nilai</label>
								    		<input type="double" name="ip" class="form-control" placeholder="Masukan Nilai" required>
								    	</div>
										<div style="margin-top: 30px">
								    		<button type="submit" class="btn btn-success" name="submit" >Simpan</button>
		        							<a href="ipk.php" class="btn btn-info" style="margin-left: 10px">Kembali</a>
								    	</div>
								        
								    </form>
								</div>
							</div>
							<!-- END INPUTS -->
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
