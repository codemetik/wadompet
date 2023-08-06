<div class="row">
	<div class="col-sm-6">
	<div class="card">
		<div class="card-header bg-nav">
			<h1 class="card-title text-bold float-left">STATUS TIKET TOPUP</h1>
		</div>
		<div class="card-body">
			<table id="example1" class="table table-sm table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>ID Tiket</th>
						<th>ID User</th>
						<th>Nama</th>
						<th>Nominal TopUp</th>
						<th>Tgl Tiket</th>
						<th>Status</th>
						<th>Deskripsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$query = mysqli_query($koneksi, "select id_tiket, x.id_user, nama_lengkap, nominal_topup, tgl_tiket, status, deskripsi from tb_user y inner join tiket_topup x on x.id_user = y.id_user");
					while ($data = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?= $data['id_tiket']; ?></td>
						<td><?= $data['id_user']; ?></td>
						<td><?= $data['nama_lengkap']; ?></td>
						<td><?= rupiah($data['nominal_topup']); ?></td>
						<td><?= $data['tgl_tiket']; ?></td>
						<td><?= $data['status']; ?></td>
						<td><p class="text-danger"><?= $data['deskripsi']; ?></p></td>
					</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
	<div class="col-sm-6">
	<div class="card">
		<div class="card-header bg-nav">
			<h1 class="card-title text-bold float-left">STATUS TIKET TARIK TUNAI</h1>
		</div>
		<div class="card-body">
			<table id="example3" class="table table-sm table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>ID Tiket Tarik</th>
						<th>ID User</th>
						<th>Nama</th>
						<th>Nominal Tarik</th>
						<th>Tgl Tarik Tunai</th>
						<th>Status</th>
						<th>Deskripsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$query = mysqli_query($koneksi, "select id_tikettarik, x.id_user, nama_lengkap, nominal_tarik, tgl_tariktunai, status, deskripsi from tb_user y inner join tiket_tariktunai x on x.id_user = y.id_user");
					while ($data = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?= $data['id_tikettarik']; ?></td>
						<td><?= $data['id_user']; ?></td>
						<td><?= $data['nama_lengkap']; ?></td>
						<td><?= rupiah($data['nominal_tarik']); ?></td>
						<td><?= $data['tgl_tariktunai']; ?></td>
						<td><?= $data['status']; ?></td>
						<td><p class="text-danger"><?= $data['deskripsi']; ?></p></td>
					</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>