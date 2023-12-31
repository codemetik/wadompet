<?php 
$sqlkas = mysqli_query($koneksi, "select total_kas as total from uang_kas");
$jmlkas = mysqli_fetch_array($sqlkas);
$jml = mysqli_num_rows($sqlkas);

$dompet = mysqli_query($koneksi, "select sum(isi_dompet) as dompet from dompet_user");
$dtdompet = mysqli_fetch_array($dompet);

$querykskeluar = mysqli_query($koneksi, "select sum(nominal_kas_keluar) as cashout from kas_keluar");
$kas_keluar = mysqli_fetch_array($querykskeluar);

?>
<div class="row">
  <div class="col-md-3 col-sm-6 col-12"><a href="?page=tabungan" class="text-dark">
    <div class="info-box callout callout-grey">
      <span class="info-box-icon text-orange elevation-1"><i class="fas fa-wallet"></i></span>

      <div class="info-box-content">
      <span class="info-box-text">ALL Wadompet</span>
        <span class="info-box-number"><?= rupiah($dtdompet['dompet']); ?></span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          Terakhir/ 21.07.2023
        </span>
      </div>
     </div>
    <!-- /.info-box -->
  </a>
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12"><a href="?page=riwayat_tabungankeluar" class="text-dark">
    <div class="info-box callout callout-grey">
      <span class="info-box-icon text-orange elevation-1"><i class="fas fa-money-check"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Aktivitas</span>
        <span class="info-box-number">Tarik Tunai Tabungan</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          Riwayat
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </a>
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12"><a href="?page=kas_masuk" class="text-dark">
    <div class="info-box callout callout-grey">
      <span class="info-box-icon text-orange elevation-1"><i class="fas fa-hand-point-right"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">KAS Masuk</span>
        <span class="info-box-number"><?= ($jml > 0) ? rupiah($jmlkas['total']) : rupiah(0) ; ?></span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          Terakhir/ 21.07.2023
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </a>
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12"><a href="?page=kas_keluar" class="text-dark">
    <div class="info-box callout callout-grey">
      <span class="info-box-icon text-orange elevation-1"><i class="fas fa-hand-point-left"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Kas Keluar</span>
        <span class="info-box-number"><?= rupiah($kas_keluar['cashout']); ?></span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          Terakhir/ 21.07.2023
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </a>
  </div>
  <!-- /.col -->
</div>
<div class="row">
  <div class="col-sm-12">
  <div class="card">
    <div class="card-header bg-nav">
      <h1 class="card-title text-bold float-left">Riwayat Topup Wadompet</h1>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-sm table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Tgl Transaksi</th>
            <th>Nominal TopUp</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no=1;
          $query = mysqli_query($koneksi, "select * from tb_user x inner join dompet_user y on y.id_user = x.id_user inner join riwayat_topup z on z.id_dompet = y.id_dompet group by id_riwayat desc");
          while ($data = mysqli_fetch_array($query)) {
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_lengkap']; ?></td>
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