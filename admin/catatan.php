     <a href="#" class="btn btn-primary float-right " data-toggle="modal" data-target="#modal-default">
      <i class="fas fa-plus"></i>
    </a>

<div class="row">
  <div class="col-sm-12">
      <?php 
      $queryct = mysqli_query($koneksi, "select * from catatan group by id_catatan desc");
      while($datact = mysqli_fetch_array($queryct)){ ?>
         <!-- Message. Default to the left -->
      <div class="direct-chat-msg left msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-timestamp float-left"><?= $datact['tgl_waktu']; ?></span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img" src="dist/img/avatar5.png" alt="Message User Image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          <?= $datact['isi']; ?>
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
      <?php }
      ?>
  </div>
</div>
<!-- modal input catatan -->
  <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content"><form action="" method="post">
      <div class="modal-body">
        <div class="form-group">
          <textarea class="form-control" name="isi" placeholder="Tulis catatan ..." required></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div></form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php 

if (isset($_POST['simpan'])) {
  $isi = $_POST['isi'];
  $date = date('Y-m-d H:i:s');

  $querycat = mysqli_query($koneksi, "insert into catatan values('', '$isi','$date')");

  if ($querycat) {
      echo "<script>
      document.location.href = '?page=catatan';
      </script>";
  }
}
?>