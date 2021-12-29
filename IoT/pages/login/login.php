<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../../koneksi.php';
  
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query( $conn, "SELECT * FROM login WHERE username='$username' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../../index.php");
 
	// cek jika user login sebagai user
	}else if($data['level']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard user
		header("location:../../User.php");
	}else{
		// alihkan ke halaman login kembali
		header("location:../../pages/login/masuk.php?pesan=gagal");
	}	
}
else{
	header("location:../../pages/login/masuk.php?pesan=gagal");
}

?>