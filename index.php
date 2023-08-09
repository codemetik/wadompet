<?php 
session_start();
include "koneksi.php";


if (isset($_SERVER['HTTP_USER_AGENT'])) {

	$show_agent = mysqli_query($koneksi, "select * from user_agent where name_user_agent = '".$_SERVER['HTTP_USER_AGENT']."'");
	$cek_agent = mysqli_num_rows($show_agent);
	$show = mysqli_fetch_array($show_agent);
	if ($cek_agent > 0) {
		$query_user = mysqli_query($koneksi, "select * from tb_user where id_user = '".$show['id_user']."'");
		$user = mysqli_fetch_array($query_user);

		if (mysqli_num_rows($query_user) > 0) {
			if (isset($user['id_level']) == '1') {
				$_SESSION['agent'] = $show['name_user_agent'];
				$_SESSION['id_user'] = $user['id_user'];
				header("location:admin.php");
			}else if (isset($user['id_level']) == '2') {
				$_SESSION['agent'] = $show['name_user_agent'];
				$_SESSION['id_user'] = $user['id_user'];
				header("location:anggota.php");
			} //
		}else{
			header("location:login.php");
		}

	}else{
		header("location:login.php");	
	}
}else{
	header("location:login.php");
}









// if (isset($_COOKIE['username']) == 0) {
// 	header("location:login.php");
// }else if (isset($_COOKIE['username']) > 0) {
// 	$user = $_COOKIE['username'];
// 	$query = mysqli_query($koneksi, "select * from tb_user where user = '$user'");
// 	$data = mysqli_fetch_array($query);

// 	if ($data['id_level'] == '1') {
// 	header("location:admin.php");
// 	}else if($data['id_level'] == '2'){
// 	header("location:anggota.php");
// 	}
// }

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