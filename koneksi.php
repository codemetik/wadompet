<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "wadompet";

$koneksi = mysqli_connect($host, $user, $pass, $db) 
or die('Could not connect : ' . mysqli_connect_error());

date_default_timezone_set('Asia/Jakarta');

// mysqli_close($koneksi);

?>