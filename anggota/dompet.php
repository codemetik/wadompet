<div class="row">
    <div class="col-md-12">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header text-white"
           style="background: url('dist/img/photo1.png') center center;">
        <h3 class="widget-user-username text-right">Saldo anda saat ini</h3>
        <h5 class="widget-user-desc text-right"><?= rupiah($user['isi_dompet']); ?></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle bg-white" src="dist/img/wallet.svg" alt="User Avatar">
      </div>
      <div class="card-footer bg-nav">
        <div class="row">
          <div class="col-sm-6 col-6 border-right"><a href="" data-toggle="modal" data-target="#modal-secondary" class="text-orange">
            <div class="description-block">
              <h5 class="description-header">Tarik</h5>
            </div></a> 
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-6 col-6"><a href="" class="text-orange">
            <div class="description-block">
              <h5 class="description-header">Kirim</h5>
            </div></a>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
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

<div class="modal fade" id="modal-secondary">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title">BUAT TIKET TARIK TUNAI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        <form action="anggota/proses/proses_tiket_tarik.php" method="post" id="formid">
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="info-box callout callout-grey bg-nav">
                  <div class="info-box-content form-group">
                    <label for="number">Nominal Tarik</label>
                    <input type="number" id="number" name="number" class="form-control text-lg" required>
                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                  </div>
                 </div>
                <!-- /.info-box -->
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" name="kirim_tiket" class="btn btn-outline-light"><i class="fas fa-paper-plane text-orange"></i> Kirim tiket</button>
          </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->