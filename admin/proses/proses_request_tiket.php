<?php 
include '../../koneksi.php';


if (isset($_GET['idijin']) == 'idijin') {
	$id = $_GET['idijin'];

	$queryselect = mysqli_query($koneksi, "select y.id_user, nama_lengkap, id_dompet, isi_dompet, id_tiket, nominal_topup, tgl_tiket from tb_user Y inner join dompet_user X on x.id_user = y.id_user inner join tiket_topup z on z.id_user = y.id_user where id_tiket = '$id'");
	$data = mysqli_fetch_array($queryselect);

	$date = date('Y-m-d H:i:s');
	$queryinsert = mysqli_query($koneksi, "insert into riwayat_topup(id_riwayat, id_dompet, tgl_trx, saldo_masuk, saldo_keluar,status) values('','".$data['id_dompet']."','$date','".$data['nominal_topup']."','','DISETUJUI')");
	if ($queryinsert) {

		$delete = mysqli_query($koneksi, "delete from tiket_topup where id_tiket = '".$data['id_tiket']."'");

		if ($delete) {
			echo "<script>
			alert('Tiket TOPUP Berhasil di SETUJUI');
			document.location.href = '../../admin.php?page=home';
			</script>";	
		}
		
	}else{
		echo "<script>
		alert('Tiket TOPUP Gagal di SETUJUI');
		document.location.href = '../../admin.php?page=home';
		</script>";
	}
}else if (isset($_GET['idtolak']) == 'idtolak') {
	$id = $_GET['idtolak'];

	$queryselect = mysqli_query($koneksi, "select y.id_user, nama_lengkap, id_dompet, isi_dompet, id_tiket, nominal_topup, tgl_tiket from tb_user Y inner join dompet_user X on x.id_user = y.id_user inner join tiket_topup z on z.id_user = y.id_user where id_tiket = '$id'");
	$data = mysqli_fetch_array($queryselect);

	$querydelete = mysqli_query($koneksi, "DELETE FROM tiket_topup WHERE id_tiket = '".$data['id_tiket']."'");
	
	$date = date('Y-m-d H:i:s');
	$queryinsert = mysqli_query($koneksi, "insert into riwayat_topup(id_riwayat, id_dompet, tgl_trx, saldo_masuk, saldo_keluar,status) values('','".$data['id_dompet']."','$date','".$data['nominal_topup']."','','DITOLAK')");

	if ($querydelete && $queryinsert) {
		echo "<script>
		alert('Tiket TOPUP DITOLAK');
		document.location.href = '../../admin.php?page=home';
		</script>";
	}else{
		echo "<script>
		alert('Tiket TOPUP GAGAL DITOLAK');
		document.location.href = '../../admin.php?page=home';
		</script>";
	}
}

?>