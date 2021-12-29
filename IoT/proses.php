<?php

//Simpan dengan nama file proses.php
require "koneksi.php";

if (isset($_GET['SETATUS']) or isset($_GET["ID"])) {
    $ID       = $_GET["ID"];
    $state    = $_GET['SETATUS'];
    $data     = query("SELECT * FROM tabel_tanaman WHERE ID = '$ID'")[0];
    if ($state == 1) {
        $state = 0;
    } else {
        $state = 1;
    }

    $sql      = "UPDATE tabel_tanaman SET SETATUS = '$state' WHERE ID = '$ID'";
    $conn->query($sql);
}


//proses output device
if (isset($_GET["Data"])) {
    $cek    = $_GET["Data"];
    $data   = query("SELECT * FROM tabel_tanaman");

    foreach ($data as $row) {
        if ($cek == $row["ID"]) {
            $json["ID"] = $row["ID"];
            $json["Data"] = $row["TANAMAN"];
            $json["Suhu"] = $row["SUHU"];
            $json["K_Udara"] = $row["UDARA"];
            $json["K_Tanah"] = $row["TANAH"];
            $json["Harga"] = $row["HARGA"];
            $json["Setatus"] = $row["SETATUS"];
        }
    }
    $result = json_encode($json);
    echo $result;
}
