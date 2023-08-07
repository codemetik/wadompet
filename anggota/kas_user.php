<div class="row">
	<div class="col-sm-12">
	<div class="card">
		<div class="card-header bg-nav">
			<h1 class="card-title text-bold float-left">RIWAYAT SETORAN KAS ANDA</h1>
		</div>
		<div class="card-body">
			<table id="example1" class="table table-sm table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>Nominal Setor</th>
						<th>Tgl Setor</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$query = mysqli_query($koneksi, "select * from kas_user where id_user = '".$user['id_user']."' group by id_kas_user desc");
					$no=1;
					while ($data = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= rupiah($data['nominal_setor']); ?></td>
						<td><?= $data['tgl_setor']; ?></td>
					</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>