<form action="admin/proses/proses_setoran_kas.php" method="post">
<div class="row elevation-1 p-2 m-1 bg-nav">
  <div class="col-sm-12">
    <div class="info-box callout callout-grey bg-dark">
      <div class="info-box-content form-group">
      	<label for="number">Nominal Topup KAS</label>
      	<input type="number" id="number" name="number" class="form-control text-lg" placeholder="Rp." required>
      </div>
     </div>
    <!-- /.info-box -->
  </div>
  <div class="col-sm-12">
    <div class="info-box callout callout-grey bg-dark">
      <div class="info-box-content form-group">
      	<label>Pilih Rekening Siswa</label>
      	  <select class="select2bs4" name="id_user[]" multiple="multiple" data-placeholder="Select a No Bank"
          style="width: 100%;">
          <?php 
          $query = mysqli_query($koneksi, "select * from tb_user");
          while ($data = mysqli_fetch_array($query)) { ?>
            <option value="<?= $data['id_user']; ?>"><?= $data['id_user'].", ".$data['nama_lengkap']; ?></option>
          <?php }
          ?>
		  </select>
      </div>
     </div>
    <!-- /.info-box -->
  </div>
  <div class="col-sm-12 text-center">
  	<button type="submit" name="setorkas" class="btn bg-light elevation-1 text-bold"><i class="fas fa-paper-plane text-orange"></i>  Kirim</button>
  </div>
</div>
</form>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-nav">
        <h1 class="card-title">Riwayat KAS</h1>
      </div>
      <div class="card-body">
          <table id="example1" class="table table-sm table-bordered table-striped">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>ID KAS</th>
                <th>User</th>
                <th>Nama</th>
                <th>Nominal Setor</th>
                <th>TgL Setor</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              $query = mysqli_query($koneksi, "select id_kas_user, user, nama_lengkap, nominal_setor, tgl_setor from kas_user x inner join tb_user y on y.id_user = x.id_user group by id_kas_user desc");
              while ($data = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['id_kas_user']; ?></td>
                <td><?= $data['user']; ?></td>
                <td><?= $data['nama_lengkap']; ?></td>
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