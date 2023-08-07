<?php 
include "../koneksi.php";
$query = mysqli_query($koneksi, "select * from notifikasi_catatan");
if (mysqli_num_rows($query) > 0 ) {
	while ($data = mysqli_fetch_array($query)) {
	echo $data['isi_chat'];
	}
}else{
	echo "Chat Null ..";
}
?>