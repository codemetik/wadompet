<?php 
include "../../koneksi.php";

if (isset($_POST['kirim'])) {
	$id_user = $_POST['id_user'];
	$mess = $_POST['message'];
	$date = date('Y-m-d H:i:s');

	$query = mysqli_query($koneksi, "insert into chatgroup values('','$id_user','$date','$mess')");

	if ($query) {
		echo "<script>
		document.location.href = '../../use_chatgroup.php';
		</script>";
	}
}
?>