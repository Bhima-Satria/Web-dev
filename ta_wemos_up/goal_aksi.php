<?php
session_start();
include "koneksi.php";

//jika ada get act
if(isset($_GET['act']))
{
	if ($_GET['act']=='delete') 
	{ 
		//jika act = delete
		$hapus = mysqli_query($konek, "DELETE FROM tb_wemos WHERE id='$_GET[id]'");

		if($hapus)
		{
			header('location:goal.php?e=Sukses');
		}
		else
		{
			header('location:goal.php?e=Gagal');
		}
	}
	else 
	{ 
		//jika act bukan insert, update, atau delete
		header('location:goal.php');
	}
}
else
{ 
	//jika tidak ada get act bukan insert
	header('location:goal.php');
}
?>