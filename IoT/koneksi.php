<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "smartgarden";
$conn = mysqli_connect($server, $username, $password, $database);

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $box = [];
  while ($sql = mysqli_fetch_assoc($result)) {
    $box[] = $sql;
  }
  return $box;
}

function formtanaman($post)
{
  global $conn;
  $ID      = $post['ID'];
  $tanaman = $post["TANAMAN"];
  $suhu    = $post["SUHU"];
  $udara   = $post["UDARA"];
  $tanah   = $post["TANAH"];
  $Harga   = $post["HARGA"];

  //update data ke
  $sql = "UPDATE tabel_tanaman SET TANAMAN = '$tanaman', SUHU = '$suhu', UDARA  = '$udara', TANAH = '$tanah', HARGA = '$Harga'
		   WHERE ID  = '$ID'";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

function formuser($post)
{
  global $conn;
  $User     = $post["User"];
  $Mail     = $post["Email"];
  $Password = $post["Password"];
  $Level    = $post["Level"];
  $No       = $post["No"];
  $LastUser = $post["Lastuser"];

  //update data ke
  $sql = "UPDATE login SET email='$Mail', username = '$User', password = '$Password', level  = '$Level', No = '$No' WHERE No  = '$No'";
  
  $sql2 = "UPDATE datasensor SET User ='$User' Where User ='$LastUser'";

  mysqli_query($conn, $sql);
  mysqli_query($conn, $sql2);
  return mysqli_affected_rows($conn);
}


if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
