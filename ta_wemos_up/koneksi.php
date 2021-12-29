<?php
$host ='localhost';
$user ='root';
$pas ='';
$database='ta_wemos';

$konek = mysqli_connect($host,$user,$pas,$database);

if (!$konek)
{
	echo "koneksi ke MYSQL gagal....";
}
?>