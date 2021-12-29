<?php 
// ini_set('display_errors', 0);
include('koneksi.php');
date_default_timezone_set("Asia/Jakarta");
$Tanggal    = date('Y-m-d');
$Jam        = date('h:i:s');
$Suhu       = $_GET['Suhu'];
$Kekeruhan  = $_GET['Kekeruhan']; 
$Ph         = $_GET['Ph']; 

?>

<?php
 require_once "koneksi.php";

  $query = "INSERT INTO tabelsensor(Tanggal,Jam,Suhu,Kekeruhan,Ph) VALUES ('$Tanggal','$Jam','$Suhu','$Kekeruhan','$Ph')";
  $result = mysqli_query($conn, $query);
  // echo $result;
?>