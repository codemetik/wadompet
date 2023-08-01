<?php 
$query_tiket = mysqli_query($koneksi, "select id_tiket, x.id_user, nama_lengkap, nominal_topup, tgl_tiket, status from tb_user y inner join tiket_topup x on x.id_user = y.id_user where user = '".$user['user']."'");
?>