<?php 
ini_set('display_errors', 0);
include('koneksi.php');
date_default_timezone_set("Asia/Jakarta");
$Id        = $_GET['Id'];
$Suhu_wsn  = $_GET['Suhu_wsn'];
$Udara_wsn = $_GET['Udara_wsn']; 
$Tanah_wsn = $_GET['Tanah_wsn']; 
$Jam       = date('Y-m-d h:i:s');
$User      = $_GET['User'];
?>

<?php
 require_once "koneksi.php";

  $query = "INSERT INTO datawsn(Id_alat,Suhu_wsn,Udara_wsn,Tanah_wsn,Jam,User) VALUES ('$Id','$Suhu_wsn','$Udara_wsn','$Tanah_wsn','$Jam','$User')";
  $result = mysqli_query($conn, $query);
  echo $result;
?>