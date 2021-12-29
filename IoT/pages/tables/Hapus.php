<?php
include "../../koneksi.php";

$User = $_GET['User'];

$delete = "DELETE FROM login WHERE username = '$User'";
$delete2 = "DELETE FROM datasensor WHERE User = '$User'";

$query  = mysqli_query($conn, $delete);
$query2 = mysqli_query($conn, $delete2);

if ($query && $query2 > 0) {
  header('location:..\..\pages\tables\tables.php?pesan=berhasil');
} else {
  header('location:..\..\pages\tables\tables.php?pesan=gagal') . $conn->error;
}

$conn->close();
