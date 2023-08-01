<div class="row">
  <div class="col-sm-12">
  <div class="card">
    <div class="card-header bg-nav">
      <h1 class="card-title text-bold float-left">Mutasi Saldo</h1>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-sm table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th hidden>Nama</th>
            <th>Tgl Transaksi</th>
            <th>Nominal TopUp</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          $query = mysqli_query($koneksi, "select * from tb_user x inner join dompet_user y on y.id_user = x.id_user inner join riwayat_topup z on z.id_dompet = y.id_dompet where user = '".$user['user']."' group by id_riwayat desc");
          while ($data = mysqli_fetch_array($query)) {
          ?>
          <tr>
            <td hidden><?= $data['nama_lengkap']; ?></td>
            <td><?= $data['tgl_trx']; ?></td>
            <td><?= rupiah($data['saldo_masuk']); ?></td>
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