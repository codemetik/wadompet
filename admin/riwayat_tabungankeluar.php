<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-nav">
        <h1 class="card-title text-bold">Tiket Masuk Tarik Tunai</h1>
      </div>
      <div class="card-body">
      <table id="example1" class="table table-sm table-bordered table-striped">
        <thead>
          <tr>
            <th>ID Tiket Tarik</th>
            <th>Nama Anggota</th>
            <th>Nominal TARIK TUNAI</th>
            <th>Waktu</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $query = mysqli_query($koneksi, "select id_tikettarik, x.id_user, nama_lengkap, nominal_tarik, tgl_tariktunai, status from tb_user y inner join tiket_tariktunai x on x.id_user = y.id_user;");
          while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
              <td><?= $data['id_tikettarik']; ?></td>
              <td><?= $data['nama_lengkap']; ?></td>
              <td><?= rupiah($data['nominal_tarik']); ?></td>
              <td><?= $data['tgl_tariktunai']; ?></td>
              <td><?= $data['status']; ?></td>
              <td>
                <a href="admin/proses/proses_request_tariktunai.php?idijin=<?= $data['id_tikettarik']; ?>" class="btn btn-white elevation-1 text-success text-bold" title="Edit Data">SETUJUI</a> || <a href="admin/proses/proses_request_tariktunai.php?idtolak=<?= $data['id_tikettarik']; ?>" class="btn btn-white elevation-1 text-danger text-bold" title="Hapus Data">TOLAK</a>
              </td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>