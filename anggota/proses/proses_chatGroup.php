<?php 


if (isset($_POST['type']) == "insert" && isset($_POST['message'])) {
	include "../../koneksi.php";
	$id_user = $_POST['id_user'];
	$message = $_POST['message'];
	$date = date('Y-m-d H:i:s');

	$query = mysqli_query($koneksi, "insert into chatgroup values('','$id_user','$date','$message')");

	// if ($query) {
	// 	echo "<script>
	// 	document.location.href = '../../use_chatgroup.php';
	// 	</script>";
	// }
}else{
	header("../../use_chatgroup.php");
	exit;
}
?>