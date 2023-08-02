<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-nav">
        <h1 class="card-title">RIWAYAT KAS MASUK</h1>
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