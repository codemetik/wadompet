<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-nav">
				<h1 class="card-title text-bold">Tiket Masuk TopUp</h1>
			</div>
			<div class="card-body">
			<table id="example1" class="table table-sm table-bordered table-striped">
				<thead>
					<tr>
						<th>ID Tiket</th>
						<th>Nama Anggota</th>
						<th>Nominal TOPUP</th>
						<th>Waktu</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$query = mysqli_query($koneksi, "select id_tiket, x.id_user, nama_lengkap, nominal_topup, tgl_tiket, status from tb_user y inner join tiket_topup x on x.id_user = y.id_user;");
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?= $data['id_tiket']; ?></td>
							<td><?= $data['nama_lengkap']; ?></td>
							<td><?= $data['nominal_topup']; ?></td>
							<td><?= $data['tgl_tiket']; ?></td>
							<td><?= $data['status']; ?></td>
							<td>
								<a href="admin/proses/proses_request_tiket.php?idijin=<?= $data['id_tiket']; ?>" class="btn btn-white elevation-1 text-success text-bold" title="Edit Data" onclick="return confirm('TopUp disetujui! Yakin?')">SETUJUI</a> || <a href="admin/proses/proses_request_tiket.php?idtolak=<?= $data['id_tiket']; ?>" class="btn btn-white elevation-1 text-danger text-bold" title="Hapus Data" onclick="return confirm('TopUp ditolak! Yakin?')">TOLAK</a>
							</td>
						</tr>
					<?php }
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>