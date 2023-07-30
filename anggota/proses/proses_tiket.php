<?php 
include "../../koneksi.php";

if (isset($_POST['kirim_tiket'])) {
	$number = $_POST['number'];

	$query = mysqli_query($koneksi, "insert into tiket_topup(id_tiket, id_user, nominal_topup, tgl_tiket, status, deskripsi) values('','1','$number',now(),'IJIN','')");
	$date = mysqli_query($koneksi, "select now() as tgl");
	$tgl = mysqli_fetch_array($date);
	$tgl_tiket = $tgl['tgl'];

	if ($query) {
		echo "<script>
		alert('Tiket TOPUP Berhasil dikirim!');
		document.location.href ='../../anggota.php?page=tiket_wadompet&tgltiket=$tgl_tiket';
		</script>";
	}else{
		echo "<script>
		alert('Tiket TOPUP Gagal dikirim!');
		document.location.href ='../../anggota.php?page=tiket_wadompet&tgltiket=$tgl_tiket';
		</script>";
	}
}
?>