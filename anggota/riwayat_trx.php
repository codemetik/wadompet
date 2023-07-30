<div class="row">
	<div class="col-sm-12">
	<div class="card">
		<div class="card-header bg-nav">
			<h1 class="card-title text-bold float-left">STATUS TIKET</h1>
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
					</tr>
				</thead>
				<tbody>
					<?php 

					$query = mysqli_query($koneksi, "select id_tiket, x.id_user, nama_lengkap, nominal_topup, tgl_tiket, status from tb_user y inner join tiket_topup x on x.id_user = y.id_user");
					while ($data = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?= $data['id_tiket']; ?></td>
						<td><?= $data['id_user']; ?></td>
						<td><?= $data['nama_lengkap']; ?></td>
						<td><?= $data['nominal_topup']; ?></td>
						<td><?= $data['tgl_tiket']; ?></td>
						<td><?= $data['status']; ?></td>
					</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>