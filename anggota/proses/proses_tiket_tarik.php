<?php 
include "../../koneksi.php";

if (isset($_POST['kirim_tiket'])) {
	$number = $_POST['number'];
	$id_user = $_POST['id_user'];

	function rupiah($angka){
	  $hasil_rupiah = "Rp. " . number_format($angka, 2 ,',','.');
	  return $hasil_rupiah;
	}
	$ceksaldo = mysqli_query($koneksi, "select * from dompet_user where id_user = '$id_user'");
	$cek = mysqli_fetch_array($ceksaldo);
	if ($cek['isi_dompet'] >= $number) {
		
			$query = mysqli_query($koneksi, "insert into tiket_tariktunai(id_tikettarik, id_user, nominal_tarik, tgl_tariktunai, status, deskripsi) values('','$id_user','$number',now(),'IJIN','Menunggu persetujuan untuk TARIK TUNAI!!!')");
	
			if ($query) {
				echo "<script>
				alert('Tiket TARIK TUNAI Berhasil dikirim!');
				document.location.href ='../../anggota.php?page=riwayat_trx&tiket_tariktunai=sukses';
				</script>";
			}else{
				echo "<script>
				alert('Tiket TARIK TUNAI Gagal dikirim!');
				document.location.href ='../../anggota.php?page=riwayat_trx';
				</script>";
			}
	}else if ($cek['isi_dompet'] <= $number) {
		echo "<script>
		alert('Maaf, Saldo anda ".rupiah($number).". Harap melakukan TopUp sebelum tarik saldo!!!');
		document.location.href ='../../anggota.php?page=home';
		</script>";
	}

}
?>