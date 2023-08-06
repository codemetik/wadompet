<div class="row">
  <div class="col-sm-12">
  <div class="card">
    <div class="card-header bg-nav">
      <h1 class="card-title text-bold float-left">Data Tabungan Anggota</h1>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Isi Dompet</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no=1;
          $query = mysqli_query($koneksi, "select nama_lengkap, isi_dompet from tb_user y inner join dompet_user x on x.id_user = y.id_user");
          while ($data = mysqli_fetch_array($query)) {
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_lengkap']; ?></td>
            <td><?= rupiah($data['isi_dompet']); ?></td>
          </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>