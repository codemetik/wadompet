<?php 
include "../koneksi.php";
$query = mysqli_query($koneksi, "select * from tb_user x inner join chatgroup y on y.id_user = x.id_user group by id_chat desc limit 1");
if (mysqli_num_rows($query) > 0 ) {
	while ($data = mysqli_fetch_array($query)) {
	echo "<b class='text-danger'>".$data['nama_lengkap']."</b> <br>: ".$data['isi_chat'];
	}
}else{
	echo "Chat Null ..";
}
?>