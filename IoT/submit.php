<?php 
// ini_set('display_errors', 0);
include('koneksi.php');
date_default_timezone_set("Asia/Jakarta");
$Tanggal    = date('Y-m-d');
$Jam        = date('h:i:s');
$Suhu       = $_GET['Suhu'];
$Kelembaban = $_GET['Kelembaban']; 
$KelembabanT= $_GET['KelembabanT']; 
$Prediksi	= $_GET['Prediksi'];
$Tanaman	= $_GET['Tanaman'];
$User     = $_GET['User'];
?>

<?php
 require_once "koneksi.php";

  $query = "INSERT INTO datasensor(Tanggal,Jam,Suhu,Kelembaban,KelembabanT,Prediksi,Tanaman,User) VALUES ('$Tanggal','$Jam','$Suhu','$Kelembaban','$KelembabanT', '$Prediksi', '$Tanaman', '$User')";
  $result = mysqli_query($conn, $query);
  // echo $result;
?>