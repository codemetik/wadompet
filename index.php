<?php 
include "koneksi.php";


if (isset($_COOKIE['username']) == 0) {
	header("location:login.php");
}else if (isset($_COOKIE['username']) > 0) {
	$user = $_COOKIE['username'];
	$query = mysqli_query($koneksi, "select * from tb_user where user = '$user'");
	$data = mysqli_fetch_array($query);

	if ($data['id_level'] == '1') {
	header("location:admin.php");
	}else if($data['id_level'] == '2'){
	header("location:anggota.php");
	}
}

// if (!isset($_COOKIE['username'])) {
// 	header("location:login.php");
// }else if (isset($_COOKIE['username'])){
//   $user = $_COOKIE['username'];
//   $query = mysqli_query($koneksi, "select * from tb_user where user = '$user'");
//   $data = mysqli_fetch_array($query);

//   if ($data['id_level'] == '1') {
//     header("location:admin.php");
//   }else if($data['id_level'] == '2'){
//     header("location:anggota.php");
//   }
// }
?>