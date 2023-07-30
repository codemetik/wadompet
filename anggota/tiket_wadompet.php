<?php 
include 'koneksi.php';

if (!isset($_GET['tgltiket'])) {
	echo "";
}else{
	$query = mysqli_query($koneksi, "SELECT * FROM tiket_topup where tgl_tiket = '".$_GET['tgltiket']."'");
	$row = mysqli_num_rows($query);
	
	if ($row > 0) {
		$data = mysqli_fetch_array($query);	
		echo "<div class='row'>
			<div class='col-md-12 col-sm-6 col-12'>
				<div class='alert alert-warning alert-dismissible fade show' role='alert'>
				  <strong>Tiket</strong> anda sedang dalam proses. Silahkan serahkan uang sesuai nominal yang anda kirimkan dalam tiket sebesar : <h3>" . rupiah($data['nominal_topup']) . "</h3>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				  </button>
				</div>
			</div>
		</div>";

	}else{ 
		echo "";
	}
}

?>