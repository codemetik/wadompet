<div class="row">
	<div class="col-sm-12"><form action="" method="post">
		<div class="form-group">
			<label for="user">Masukan Username Tujuan</label>
			<input type="number" name="akun" class="form-control" placeholder="123456" required>
		</div>
		<div class="form-group">
			<label for="number">Nominal Kirim Saldo</label>
			<input type="number" name="number" class="form-control" placeholder="Rp. ..." required>
		</div>
		<div class="form-group">
			<button class="btn bg-white elevation-1 text-bold" name="kirimsaldo" onclick="return confirm('Yakin ingin kirim saldo?')"><i class="fas fa-paper-plane text-orange"></i> Kirim Sekarang</button>
		</div></form>
	</div>
		<div class="col-sm-12">
	<div class="card">
		<div class="card-header bg-nav">
			<h1 class="card-title text-bold float-left">Mutasi Sado Keluar</h1>
		</div>
		<div class="card-body">
			<table id="example1" class="table table-sm table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>TGL TRX</th>
						<th>Saldo Keluar</th>
						<th>Saldo Awal</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$query = mysqli_query($koneksi, "select * from riwayat_topup x inner join dompet_user y on y.id_dompet = x.id_dompet where x.id_dompet = '".$user['id_dompet']."'");
					while ($data = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?= $data['tgl_trx']; ?></td>
						<td><?= rupiah($data['saldo_keluar']); ?></td>
						<td><?= rupiah($data['saldo_awal']); ?></td>
						<td><p class="text-danger"><?= $data['status']; ?></p></td>
					</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>
<?php 
	if (isset($_POST['kirimsaldo'])) {
		
		$userto = $_POST['akun'];
		$saldo = $_POST['number'];
		$userme = $user['id_user'];
		$id_dompet = $user['id_dompet'];
		$isi_dompet = $user['isi_dompet'];
		$date = date('Y-m-d H:i:s');

		$quserto = mysqli_query($koneksi, "select * from dompet_user x inner join tb_user y on y.id_user = x.id_user where user = '".$userto."'");
		if (mysqli_num_rows($quserto) > 0) {
			$to = mysqli_fetch_array($quserto);
			//insert table riwayat_tariktunai untuk potong saldo
			$catbalance = mysqli_query($koneksi, "insert into riwayat_tariktunai values('','$id_dompet','$date','$saldo','$isi_dompet','SENDSALDO')");

			//insert table riwayat_topup untuk tambah saldo
			$insertbalance = mysqli_query($koneksi, "insert into riwayat_topup values('','".$to['id_dompet']."','$date','$saldo','".$to['isi_dompet']."','SENDSALDO')");

			if ($catbalance && $insertbalance) {
				echo "<script>
				document.location.href = 'anggota.php?page=sendsaldo';
				</script>";
			}else{
				echo "<script>
				document.location.href = 'anggota.php?page=sendsaldo';
				</script>";
			}

		}

	}
?>