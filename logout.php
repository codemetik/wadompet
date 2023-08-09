<?php 
session_start();
include "koneksi.php";
$delete = mysqli_query($koneksi, "delete from user_agent where name_user_agent = '".$_SESSION['agent']."'");
// unset($_SESSION['agent']);
// unset($_SESSION['id_user']);
session_destroy();
header("location:index.php");
?>