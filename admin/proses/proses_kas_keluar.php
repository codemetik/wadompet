<?php 
include "../../koneksi.php";

if (isset($_POST['kas_keluar'])) {
	$id_user = $_POST['id_user'];
	$tarik = $_POST['nominal_tarik'];
	$deskrip = $_POST['deskripsi'];
	$date = date('Y-m-d H:i:s');

	$query = mysqli_query($koneksi, "insert into kas_keluar(id_kas_keluar, id_user, nominal_kas_keluar, tgl_tarik, deskripsi) values('','".$id_user."','".$tarik."','".$date."','".$deskrip."')");

	if ($query) {
		echo "<script>
		alert('Uang kas berhasil ditarik sebesar Rp. $tarik');
		document.location.href = '../../admin.php?page=kas_keluar#riwayat_kas_keluar';
		</script>";	
	}else{
		echo "<script>
		alert('Uang kas berhasil ditarik sebesar Rp. $tarik');
		document.location.href = '../../admin.php?page=kas_keluar#riwayat_kas_keluar';
		</script>";	
	}
}
?>