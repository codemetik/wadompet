<?php 
include "../../koneksi.php";
if (isset($_POST['hapus'])) {

	$check = $_POST['checkbox'];
	$jumlah_pilih = count($check);

	for ($i=0; $i < $jumlah_pilih ; $i++) {
	  mysqli_query($koneksi, "delete from user_agent where id_agent = '".$check[$i]."'");
	}

	  echo "<script>
	  alert('Data berhasil masuk');
	  document.location.href = '../../index.php';
	  </script>";
}

?>