<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-nav">
        <h1 class="card-title" id="riwayat_kas_keluar">DAFTAR LOGIN ANGGOTA</h1>
      </div>
      <div class="card-body">
        <form action="admin/proses/proses_hapus_daftarlogin.php" method="post">
          <table id="example1" class="table table-sm table-bordered table-striped">
            <thead>
              <tr class="text-center">
                <th>Pilih</th>
              	<th>No:</th>
                <th>Nama</th>
                <th>status</th>
                <th>Tgl Login</th>
                <th>Perangkat</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              $query = mysqli_query($koneksi, "select * from user_agent x inner join tb_user y on y.id_user = x.id_user group by id_agent desc");
              while ($data = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td class="text-center"><input type="checkbox" class="checkbox" name="checkbox[]" multiple="multiple" value="<?= $data['id_agent'] ?>"></td>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_lengkap']; ?></td>
                <td><a href=""> Online ...</a></td>
                <td><?= $data['tgl_login']; ?></td>
                <td><?= $data['name_user_agent']; ?></td>
              </tr>
              <?php }
              ?>
            </tbody>
            <tfoot>
              <tr class="text-center">
                <th>
                  <input type="checkbox" id="check-all" class="form-control" />Pilih Semua
                </th>
                <th><input type="submit" name="hapus" value="Hapus" class="btn bg-orange"></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>