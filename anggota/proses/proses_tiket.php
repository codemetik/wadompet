<?php 
include "../../koneksi.php";

if (isset($_POST['kirim_tiket'])) {
	$number = $_POST['number'];
	$id_user = $_POST['id_user'];

	$query = mysqli_query($koneksi, "insert into tiket_topup(id_tiket, id_user, nominal_topup, tgl_tiket, status, deskripsi) values('','$id_user','$number',now(),'IJIN','Silahkan lakukan Pembayaran sebesar nominal Tiket TopUp')");
	
	if ($query) {
		echo "<script>
		alert('Tiket TOPUP Berhasil dikirim!');
		document.location.href ='../../anggota.php?page=riwayat_trx&tiket=sukses';
		</script>";
	}else{
		echo "<script>
		alert('Tiket TOPUP Gagal dikirim!');
		document.location.href ='../../anggota.php?page=riwayat_trx';
		</script>";
	}
}
?>