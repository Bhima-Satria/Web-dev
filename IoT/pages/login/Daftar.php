<?php 
// ini_set('display_errors', 0);
include('../../koneksi.php');

date_default_timezone_set("Asia/Jakarta");
$Tanggal    = date('Y-m-d');
$Jam        = date('h:i:s');

$username =$_POST["username"];
$email    =$_POST["email"];
$password =$_POST["password"];
$level    =$_POST["level"];

$cekuser = mysqli_query( $conn, "SELECT * FROM login WHERE email='$email'");
$cek = mysqli_num_rows($cekuser);

if($cek>0){
  header("location:../../pages/login/masuk.php?pesan=duplikat");
} 

else {
  $query = "INSERT INTO login (username,email,password,level) VALUES ('$username','$email','$password','$level')";
  $query1 = "INSERT INTO datasensor(Tanggal,Jam,Suhu,Kelembaban,KelembabanT,Prediksi,User) VALUES ('$Tanggal','$Jam','0','0','0','0','$username')";
  
    $result = mysqli_query($conn, $query);
    $result1 = mysqli_query($conn, $query1);
  
    if($result>0 && $result1>0){
      header("location:../../pages/login/masuk.php?pesan=berhasil");
    } 
    else header("location:../../pages/login/masuk.php?pesan=gagal");
}
