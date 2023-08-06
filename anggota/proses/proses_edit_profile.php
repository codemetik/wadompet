<?php 
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
	$user = $_POST['user'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$temp_lahir = $_POST['temp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$alamat_sekarang = $_POST['alamat_sekarang'];

	$query = mysqli_query($koneksi, "update tb_user set pass = '$pass', email = '$email', temp_lahir = '$temp_lahir', tgl_lahir = '$tgl_lahir', alamat_sekarang = '$alamat_sekarang' where user = '$user'");

	if ($query) {
		echo "<script>
		  alert('Data berhasil diperbarui');
		  document.location.href = '../../anggota.php?page=profile&editprofile=sukses'
		  </script>";
	}else{
		echo "<script>
		alert('Data gagal diperbarui');
		document.location.href = '../../anggota.php?page=profile'
		</script>";
	}
}
?>