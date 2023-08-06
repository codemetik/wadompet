<?php 
include '../../koneksi.php';


if (isset($_GET['idijin']) == 'idijin') {
	$id = $_GET['idijin'];

	$queryselect = mysqli_query($koneksi, "select y.id_user, nama_lengkap, id_dompet, isi_dompet, id_tikettarik, nominal_tarik, tgl_tariktunai from tb_user Y inner join dompet_user X on x.id_user = y.id_user inner join tiket_tariktunai z on z.id_user = y.id_user where id_tikettarik = '$id'");
	$data = mysqli_fetch_array($queryselect);

	$date = date('Y-m-d H:i:s');
	$queryinsert = mysqli_query($koneksi, "insert into riwayat_tariktunai(id_riwayattarik, id_dompet, tgl_trxtarik, saldo_keluar, saldo_awal, status) values('','".$data['id_dompet']."','$date','".$data['nominal_tarik']."','".$data['isi_dompet']."','DISETUJUI')");
	if ($queryinsert) {

		$delete = mysqli_query($koneksi, "delete from tiket_tariktunai where id_tikettarik = '".$data['id_tikettarik']."'");

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

	$queryselect = mysqli_query($koneksi, "select y.id_user, nama_lengkap, id_dompet, isi_dompet, id_tikettarik, nominal_tarik, tgl_tariktunai from tb_user Y inner join dompet_user X on x.id_user = y.id_user inner join tiket_tariktunai z on z.id_user = y.id_user where id_tikettarik = '$id'");
	$data = mysqli_fetch_array($queryselect);

	$querydelete = mysqli_query($koneksi, "DELETE FROM tiket_tariktunai WHERE id_tikettarik = '".$data['id_tikettarik']."'");
	
	$date = date('Y-m-d H:i:s');
	$queryinsert = mysqli_query($koneksi, "insert into riwayat_tariktunai(id_riwayattarik, id_dompet, tgl_trxtarik, saldo_keluar, saldo_awal,status) values('','".$data['id_dompet']."','$date','".$data['nominal_tarik']."','".$data['isi_dompet']."','DITOLAK')");

	if ($querydelete && $queryinsert) {
		echo "<script>
		alert('Tiket TARIKTUNAI DITOLAK');
		document.location.href = '../../admin.php?page=riwayat_tabungankeluar';
		</script>";
	}else{
		echo "<script>
		alert('Tiket TARIK TUNAI GAGAL DITOLAK');
		document.location.href = '../../admin.php?page=riwayat_tabungankeluar';
		</script>";
	}
}

?>