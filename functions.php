<?php 
//koneksi ke database, kita membutuhkan driver yaitu mysqli, nama host, username mysql, pwd, nama database. koneksi ini disimpan di dalam variable
$conn=mysqli_connect("localhost", "root", "", "ases2pabw");

function registrasi($data){
	global $conn;

	$email = strtolower($data["email"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$konfir_password= mysqli_real_escape_string($conn, $data["konfir_password"]);

	//cek email ganda
	$result = mysqli_query($conn, "SELECT email FROM akun WHERE email = '$email'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script> alert('Email yang anda masukkan telah terdaftar sebelumnya'); </script>";
		return false;
	}

	//cek password
	if ($password !== $konfir_password) {
		echo "<script>
		alert('Konfirmasi password tidak sesuai!'); </script>";
		return false;
	}

	//enkripsi password
	$password=password_hash($password, PASSWORD_DEFAULT);

	//tambah ke database
	mysqli_query($conn, "INSERT INTO akun VALUES('', '$email', '$password')");
	return mysqli_affected_rows($conn);
}


//proses mengambil data
function query($query){
	//agar mengacu variable $conn global
	global $conn;
	//parameter nya ada dua, yang pertama adalah koneksi, yang kedua adalah query nya apa
	$result = mysqli_query($conn, $query);
	//variable untuk menaruh array
	$rows = [];
	//array asosiatif, agar pemanggilan index menggunakan string
	//$row adalah setiap index yang diambil
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	//mengembailkan variable
	return $rows;
}

function tambah_ipk($data){
	global $conn;

	$semester=htmlspecialchars($data["semester"]);
	$ip=htmlspecialchars($data["ip"]);

	$query = "INSERT INTO iprestasi VALUES
			('', '$semester', '$ip')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_ip($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM iprestasi WHERE idip = $id");

	return mysqli_affected_rows($conn);
}

function ubah_ip($data){
	global $conn;

	$idip = $_GET["id"];
	$semester=htmlspecialchars($data["semester"]);
	$ip=htmlspecialchars($data["ip"]);


	$query = "UPDATE iprestasi SET
			semester='$semester',
			ip = '$ip'
			WHERE idip = $idip
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
?>