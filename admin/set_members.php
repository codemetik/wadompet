<div class="row">
	<div class="col-sm-12">
	<div class="card">
		<div class="card-header bg-nav">
			<h1 class="card-title text-bold float-left">Anggota</h1>
			<a href="" class="btn bg-white elevation-2 float-right text-sm"><i class="fas fa-plus text-orange"></i> Tambah Anggota</a>
		</div>
		<div class="card-body">
			<table id="example1" class="table table-sm table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>Foto Profile</th>
						<th>Nama Lengkap</th>
						<th>username</th>
						<th>Email</th>
						<th>Tempat & Tgl Lahir</th>
						<th>Alamat Sekarang</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<?php 

					$query = mysqli_query($koneksi, "select * from tb_user");
					while ($data = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td>
							<img src="dist/img/user1-128x128.jpg" class="img-circle" alt="User Image" width="60" height="60">
						</td>
						<td><?= $data['nama_lengkap']; ?></td>
						<td><?= $data['user']; ?></td>
						<td><?= $data['email']; ?></td>
						<td><?= $data['temp_lahir'] . ", " . $data['tgl_lahir']; ?></td>
						<td><?= $data['alamat_sekarang']; ?></td>
						<td><a href="" class="btn btn-white elevation-1" title="Edit Data"><i class="fas fa-edit text-orange"></i></a></td>
					</tr>
					<?php }

					?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>