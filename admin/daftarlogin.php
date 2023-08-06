<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-nav">
        <h1 class="card-title" id="riwayat_kas_keluar">DAFTAR LOGIN ANGGOTA</h1>
      </div>
      <div class="card-body">
          <table id="example1" class="table table-sm table-bordered table-striped">
            <thead>
              <tr class="text-center">
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
                <td><?= $no++; ?></td>
                <td><?= $data['nama_lengkap']; ?></td>
                <td><a href=""> Online ...</a></td>
                <td><?= $data['tgl_login']; ?></td>
                <td><?= $data['name_user_agent']; ?></td>
              </tr>
              <?php }
              ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>