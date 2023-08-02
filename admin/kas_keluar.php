<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-nav">
				<h1 class="card-title">Tarik Dana KAS</h1>
			</div>
			<div class="card-body">
				<form action="admin/proses/proses_kas_keluar.php" method="post">
					<div class="form-group">
						<label for="nominal">Nominal Tarik</label>
						<input type="number" name="nominal_tarik" id="nominal" class="form-control" autofocus required placeholder="Rp. ..">
						<input type="hidden" name="id_user" value="<?= $show['id_user']; ?>">
					</div>
					<div class="form-group">
						<label for="desk">Deskripsi</label>
						<textarea class="form-control" name="deskripsi" id="desk" placeholder="Kebutuhan Foto Copy" required></textarea>
					</div>
					<div class="form-group bg-warning p-1">
						<p>Penarikan ini akan mengurangi nilai saldo kas yang ada. Harap lebih berhati-hati!</p>
					</div>
					<div class="form-group">
						<button type="submit" name="kas_keluar" class="btn bg-light elevation-1 text-bold"><i class="fas fa-money-bill text-orange"></i>  Tarik</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-nav">
        <h1 class="card-title" id="riwayat_kas_keluar">RIWAYAT KAS KELUAR</h1>
      </div>
      <div class="card-body">
          <table id="example1" class="table table-sm table-bordered table-striped">
            <thead>
              <tr class="text-center">
              	<th>No:</th>
                <th>ID Invoice</th>
                <th>ID User</th>
                <th>Tarik Tunai Rp.</th>
                <th>Tgl Tarik</th>
                <th>Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              $query = mysqli_query($koneksi, "select * from kas_keluar group by id_kas_keluar desc");
              while ($data = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['id_kas_keluar']; ?></td>
                <td><?= $data['id_user']; ?></td>
                <td><?= rupiah($data['nominal_kas_keluar']); ?></td>
                <td><?= $data['tgl_tarik']; ?></td>
                <td><?= $data['deskripsi']; ?></td>
              </tr>
              <?php }
              ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>