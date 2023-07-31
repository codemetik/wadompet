<?php 
include "../../koneksi.php";

if (isset($_POST['setorkas'])) {
  $number = $_POST['number'];
  $id_user = $_POST['id_user'];

  $jumlah_pilih = count($id_user);
  $date = date('Y-m-d H:i:s');

  for ($i=0; $i < $jumlah_pilih ; $i++) {
    mysqli_query($koneksi, "insert into kas_user values('','$id_user[$i]','$number','$date')");
  }
  $jumlahkas = $number * $jumlah_pilih;
  $uangkas = mysqli_query($koneksi, "select * from uang_kas");
  $dtkas = mysqli_fetch_array($uangkas);
  mysqli_query($koneksi, "update uang_kas set total_kas = ".$dtkas['total_kas']." + $jumlahkas");

  echo "<script>
  alert('Data berhasil masuk');
  document.location.href = '../../admin.php?page=kas'
  </script>";
}
?>